importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js');

const CACHE_NAME = 'cahe-20240926';
const CACHE = "loading-page";
const offlineFallbackPage = "/offline.html";  // Ensure this page exists

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll([
        offlineFallbackPage,  // Fallback offline page
        '/wp-content/themes/dlap/assets/app-icon/1024x1024.png',
        '/wp-content/themes/dlap/assets/app-icon/512x512.png',
        // Other resources to cache...
      ]);
    })
  );
  self.skipWaiting(); // Activate the service worker immediately
});

self.addEventListener('activate', (event) => {
    event.waitUntil(updateWidgets());

  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (!cacheWhitelist.includes(cacheName)) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
  event.waitUntil(self.clients.claim()); // Take control of open pages
});
async function updateWidgets() {
    // Check if the widgets API is available
    if (!self.widgets || !self.widgets.getByTag) {
      console.error("Widgets API is not available or getByTag is undefined.");
      return;
    }
    
    const widget = await self.widgets.getByTag("DLA");
    if (!widget) {
      return;
    }
  
    // Using the widget definition, get the template and data.
    const template = await (await fetch(widget.definition.msAcTemplate)).text();
    const data = await (await fetch(widget.definition.data)).text();
  
    // Render the widget with the template and data.
    await self.widgets.updateByTag(widget.definition.tag, { template, data });
  }

if (!self.widgets.getByTag) {
    self.widgets.getByTag = async function(tag) {
        // Look for the widget by tag
        const widget = widgetsStore.find(widget => widget.tag === tag);
        if (!widget) {
        console.error(`Widget with tag "${tag}" not found.`);
        return null;
        }
        return widget;
    }
}

if (!self.widgets.updateByTag) {
    self.widgets.updateByTag = async function(tag, data) {
        // Implement widget update logic here, e.g., update cached data
        console.log(`Updating widget with tag "${tag}"`, data);
        // You can update this data in a cache or some other store
    }
}

self.addEventListener('fetch', (event) => {
    // Skip unsupported schemes
    if (event.request.url.startsWith('chrome-extension://')) {
      return;
    }
  
    if (event.request.method === 'POST') {
      // Just fetch and return the response for POST requests
      event.respondWith(fetch(event.request));
      return;
    }
  
    if (event.request.mode === 'navigate') {
      event.respondWith((async () => {
        try {
          const preloadResp = await event.preloadResponse;
          if (preloadResp) {
            return preloadResp;
          }
  
          const networkResp = await fetch(event.request);
          return networkResp;
        } catch (error) {
          const cache = await caches.open(CACHE);
          const cachedResp = await cache.match(offlineFallbackPage);
          return cachedResp;
        }
      })());
    } else {
      event.respondWith(
        caches.match(event.request).then((response) => {
          return response || fetch(event.request).then((networkResponse) => {
            return caches.open(CACHE_NAME).then((cache) => {
              // Only cache GET requests
              if (event.request.method === 'GET') {
                cache.put(event.request, networkResponse.clone());
              }
              return networkResponse;
            });
          });
        })
      );
    }
  });

  self.addEventListener('push', function(event) {
    const data = event.data ? event.data.json() : {};
  
    const title = data.title || 'DLAQF';
    const options = {
      body: data.body || 'Welcome',
      icon: data.icon || '/wp-content/themes/dlap/assets/icons/dlap-logo.svg', // Set your icon path
      badge: data.badge || '/wp-content/themes/dlap/assets/icons/dlap-logo.svg', // Set your badge path
      data: {
        url: data.url || '/' // Redirect URL on notification click
      }
    };
  
    event.waitUntil(
      self.registration.showNotification(title, options)
    );
  });
  
  // Handle notification click
  self.addEventListener('notificationclick', function(event) {
    event.notification.close();
    event.waitUntil(
      clients.openWindow(event.notification.data.url) // Open the specified URL
    );
  });


  // Listen for sync event in the service worker
self.addEventListener('sync', function(event) {
    if (event.tag === 'sync-user-action') {
        event.waitUntil(syncUserActions());  // Sync the deferred user actions
    }
});

// Function to sync user actions (e.g., fetch data from IndexedDB/localStorage and send to server)
function syncUserActions() {
    return new Promise(function(resolve, reject) {
        // Fetch the data stored while offline
        let offlineData = getOfflineData();
        
        // Perform sync (e.g., send the stored data to the server)
        if (offlineData && offlineData.length > 0) {
            console.log('Syncing offline data:', offlineData);
            // Perform network request to sync the data
            fetch('/wp-json/api/v1/data', {
                method: 'POST',
                body: JSON.stringify(offlineData),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    console.log('Data synced successfully');
                    clearOfflineData();  // Clear stored data after successful sync
                    resolve();
                } else {
                    reject('Sync failed');
                }
            }).catch(err => {
                console.error('Error syncing data:', err);
                reject(err);
            });
        } else {
            resolve(); // No offline data to sync
        }
    });
}

// Function to fetch offline data from localStorage
function getOfflineData() {
    return JSON.parse(localStorage.getItem('offlineData') || '[]');
}

// Function to clear offline data after successful sync
function clearOfflineData() {
    localStorage.removeItem('offlineData');
}

self.addEventListener('periodicsync', (event) => {
if (event.tag === 'sync-updates') {
    event.waitUntil(updateAppContent());
}
});

async function updateAppContent() {
try {
    // Fetch new data from the server
    const response = await fetch('/wp-json/api/v1/data');
    const data = await response.json();
    
    // Do something with the data (e.g., cache it, update the UI)
    // Cache data for offline use
    const cache = await caches.open('app-updates');
    await cache.put('/wp-json/api/v1/data', new Response(JSON.stringify(data)));
    console.log('App content updated in the background');
} catch (err) {
    console.error('Failed to update app content in the background', err);
}
}

  // Listen to the widgetinstall event.
self.addEventListener("widgetinstall", event => {
    // The widget just got installed, render it using renderWidget.
    // Pass the event.widget object to the function.
    event.waitUntil(renderWidget(event.widget));
  });
  
  async function renderWidget(widget) {
    // Get the template and data URLs from the widget definition.
    const templateUrl = widget.definition.msAcTemplate;
    const dataUrl = widget.definition.data;
  
    // Fetch the template text and data.
    const template = await (await fetch(templateUrl)).text();
    const data = await (await fetch(dataUrl)).text();
  
    // Render the widget with the template and data.
    await self.widgets.updateByTag(widget.definition.tag, {template, data});
  }