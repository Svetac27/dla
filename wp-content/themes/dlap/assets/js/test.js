/* eslint-disable no-alert */
/* eslint-disable no-unused-vars */

const metaLen = 6
const donutPercentage = ( value ) => {
	return '<div class="numbers-small">' + value + '<span class="symbols-small">%</span></div>'
}
function toggleDropdown( e ) {
	const parent = e.target.closest( '.tile-dropdown' )
	if ( parent.classList.contains( 'closed' ) ) {
		parent.classList.remove( 'closed' )
		parent.classList.add( 'opened' )
	} else {
		parent.classList.remove( 'opened' )
		parent.classList.add( 'closed' )
	}
}

function base64Encode(text) {
	// Use btoa to encode the UTF-8 string to Base64

	if (text) {
		return btoa(encodeURIComponent(text).replace(/%([0-9A-F]{2})/g, function(match, p1) {
			return String.fromCharCode('0x' + p1);
		}));
	}
}

// Function to decode a Base64 string to its original form
function base64Decode(encoded) {
	if (encoded) {
		// Use atob to decode the Base64 string and handle UTF-8
		return decodeURIComponent(atob(encoded).split('').map(function(c) {
			return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
		}).join(''));
	}
}
const businessCard = base64Encode('business-card')


function setCookie(name, value, days) {
    const date = new Date();

    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function deleteCookie(name) {
    document.cookie = name + '=; Max-Age=-1; path=/; domain=' + window.location.hostname;
}


function getBusinessCardData () {
	if (getCookie(businessCard)) {
		return JSON.parse(base64Decode(getCookie(businessCard)))
	} return null
}

function setBusinessCardData (data = {}) {
	return setCookie(businessCard, base64Encode(JSON.stringify(data)), 1000000)
}

function removeBusinessCardData() {
	deleteCookie(businessCard)
}


function generateBusinessCardQR() {
	const wrapper = document.getElementById('qrcode').parentNode
	wrapper.innerHTML = ''
	
	const qr = document.createElement('canvas')
	qr.setAttribute('id', 'qrcode')
	qr.setAttribute('class', 'mx-auto')

	wrapper.appendChild(qr)

        // JSON data
        const contact = getBusinessCardData()


if (contact) {
        // Convert JSON data to vCard format
		const vCardData = `
BEGIN:VCARD
VERSION:3.0
N:;${contact.full_name};;${contact.prefix};
FN:${contact.full_name}
ORG:${contact.company}
TITLE:${contact.job_title}
EMAIL;TYPE=INTERNET:${contact.email}
TEL;TYPE=CELL:${contact.phone}
NOTE:${contact.pronouns}
NOTES:${contact.pronouns}
X-PRONOUNS:${contact.pronouns}
URL;TYPE=WEB:${contact.web_bio_url}
URL;TYPE=SOCIAL:${contact.social_url}
END:VCARD`.trim();
		
			// Generate QR code
			QRCode.toCanvas(document.getElementById('qrcode'), vCardData, function (error) {
				if (error) console.error(error);
				console.log('QR code generated!');
			});
		}
}

// update the info being displayed
function updateBusinessCardInfo () {
	const jsonData = getBusinessCardData()

	Object.keys(jsonData).forEach(identification => {
		const theID = `id-${identification.toLowerCase().trim().replace(/ /g, '-')}`
		const elm = document.getElementById(theID)
		elm ? elm.innerHTML = jsonData[identification] : ''
	})
}

function updateFormCurrentValue () {
	const jsonData = getBusinessCardData()

	Object.keys(jsonData).forEach(identification => {
		const elm = document.querySelector(`[name="${identification}"]`)
		elm ? elm.value = jsonData[identification] : ''
	})
}

function showBusinessCard () {
	const jsonData = getBusinessCardData()
	updateBusinessCardInfo()
	document.querySelector('.business-card-page .user-info').classList.remove('hidden')
	document.querySelector('.business-card-page .form-fields').classList.add('hidden')
	document.querySelector('.business-card.header-text').innerHTML = (jsonData.prefix ? jsonData.prefix + ' ' :  '') + jsonData.full_name
}

document.addEventListener('DOMContentLoaded', function () {
	// check if have business card data
	if (getBusinessCardData()) {
		document.querySelector('.business-card-icon-wrapper .error-icon')?.classList.add('hidden');
		document.querySelector('.business-card-icon-wrapper .business-card')?.classList.remove('hidden');
	} else {
		document.querySelector('.business-card-icon-wrapper .error-icon')?.classList.remove('hidden');
		document.querySelector('.business-card-icon-wrapper .business-card')?.classList.add('hidden');
	}

	// check if business card page
	if (document.querySelector('.business-card-page')) {
		const jsonData = getBusinessCardData()
	
		if (jsonData) {
			document.querySelector('.business-card-icon-wrapper .business-card')?.classList?.remove('hidden')
			document.querySelector('.business-card-icon-wrapper .error-icon')?.classList.add('hidden')
			document.querySelector('.business-card.header-text').innerHTML = (jsonData.prefix ? jsonData.prefix + ' ' :  '') + jsonData.full_name
		} else {
			document.querySelector('.business-card-icon-wrapper .business-card')?.classList.add('hidden')
			document.querySelector('.business-card-icon-wrapper .error-icon')?.classList.remove('hidden')
		}

		if (jsonData) {
			updateFormCurrentValue()
			updateBusinessCardInfo()
		}
		generateBusinessCardQR()

		document.querySelectorAll('.edit-business-card').forEach(item => {
			item.addEventListener('click', function () {
				document.querySelector('.business-card-page .user-info').classList.add('hidden')
				document.querySelector('.business-card-page .form-fields').classList.remove('hidden')
				document.querySelector('.business-card.header-text').innerHTML = 'Edit Info'
			})
		})

		if (jsonData && jsonData.full_name) {
			document.querySelector('.business-card.header-text').innerHTML = (jsonData.prefix ? jsonData.prefix + ' ' :  '') + jsonData.full_name
		}
		document.querySelectorAll('.business-card-form').forEach(item => {
			item.addEventListener('submit', function(e) {	
				e.preventDefault()

				const isValid = validateForm(item)

				if (isValid) {
					const formData = new FormData(this); // Create a new FormData object from the form

					// Convert FormData to a plain object
					const formObject = {};
					formData.forEach((value, key) => {
						formObject[key] = value;
					});

					console.lg

					setBusinessCardData(formObject);
					generateBusinessCardQR()
					showBusinessCard()
				} else {

					const elements = item.querySelectorAll('.error');
					
					// Iterate over all elements to find the first one with the given inner text
					for (let element of elements) {
						if (element.innerText.trim().length) {
							// Scroll to the element
							element.closest('.form-field').scrollIntoView({ behavior: 'smooth', block: 'start' });
							break;
						}
					}
				}

				return false;
			})
		})

		document.querySelectorAll('.business-card-form .submit-button').forEach(item => {
			item.addEventListener('click', function (e) {
				e.preventDefault()

				const isValid = validateForm(item.closest('form'))
				console.log(isValid ? 'true' : 'false')


				return false;
			})
		})
	}
});

// form-validator.js

function validateForm(formElm) {
    // Clear previous errors
    clearErrors(formElm);

    const form = formElm;

	if (formElm) {
		const inputs = form.querySelectorAll('input');
		let isValid = true;

		inputs.forEach(input => {
			const value = input.value.trim();
			const errorElement = formElm.querySelector('.' + input.name + 'Error');
			
			if (input.hasAttribute('required') && value === '') {
				showError(errorElement, `${input.name} is required`);
				isValid = false;
			}

			if (input.dataset.minlength && value.length < input.dataset.minlength) {
				showError(errorElement, `${input.name} must be at least ${input.dataset.minlength} characters long`);
				isValid = false;
			}

			if (input.type === 'email' && input.validity.typeMismatch) {
				showError(errorElement, `Please enter a valid email address`);
				isValid = false;
			}

			if (input.dataset.match) {
				const matchInput = form.querySelector(`#${input.dataset.match}`);
				if (value !== matchInput.value.trim()) {
					showError(errorElement, `${input.name} does not match ${matchInput.name}`);
					isValid = false;
				}
			}
		});

		return isValid;
	} return true
}

function showError(errorElement, message) {
    // Replace underscores with spaces
    let result = message.replace(/_/g, ' ');

    // Capitalize only the first letter of the resulting string
    result = result.charAt(0).toUpperCase() + result.slice(1).toLowerCase();

    errorElement.innerText = result
}

function clearErrors(formElm) {
    const errorElements = formElm.getElementsByClassName('error');
    for (let i = 0; i < errorElements.length; i++) {
        errorElements[i].innerText = '';
    }
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}


// This function requests notification permission from the user
function requestNotificationPermission() {
	Notification.requestPermission().then((permission) => {
	  if (permission === 'granted') {
		console.log('Notification permission granted.');
		// Proceed to subscribe to push notifications
		subscribeUserToPush();
	  } else {
		console.log('Notification permission denied.');
	  }
	});
  }
  
  // This function subscribes the user to push notifications
  function subscribeUserToPush() {
	if ('serviceWorker' in navigator) {
	  navigator.serviceWorker.ready.then((registration) => {
		registration.pushManager.subscribe({
		  userVisibleOnly: true,
		  applicationServerKey: urlB64ToUint8Array('BBJJzPB7_LO0a5z_LVn5wZgOH7s5S-r_1RXMsR8-rQjJiTWsiPv1Iynacc3qAexps5Dm8LpjdTH5NV2gA929je0') // Replace with your VAPID public key
		})
		.then((subscription) => {
		  console.log('User is subscribed:', subscription);
		  // Send the subscription to your server to store it
		})
		.catch((err) => {
		  console.log('Failed to subscribe the user: ', err);
		});
	  });
	}
  }
  
  // Function to convert VAPID key to Uint8Array
function urlB64ToUint8Array(base64String) {
	try {
		// Add padding if necessary
		const padding = '='.repeat((4 - base64String.length % 4) % 4);
		// Replace URL-safe characters
		const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
		// Check if the string is valid base64 before decoding
		// console.log("Base64 string after padding and replacements:", base64);
		// Decode the base64 string
		const rawData = window.atob(base64);
		// Convert raw data to Uint8Array
		return new Uint8Array([...rawData].map((char) => char.charCodeAt(0)));
	} catch (error) {
		//  do nothing
		// Log any decoding errors
		// console.error("Error decoding base64 string:", error);
		// throw new Error("Invalid base64 string");
	}
	
	// function urlB64ToUint8Array(base64String) {
	// 	const padding = '='.repeat((4 - base64String.length % 4) % 4);
	// 	const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
	// 	const rawData = window.atob(base64);
	// 	return new Uint8Array([...rawData].map((char) => char.charCodeAt(0)));
	//   }
}
  
  
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('/serviceWorker.js', { scope: '/' })
	.then(async function(registration) {
		console.log('Service Worker registered with scope:', registration.scope);
		
		requestNotificationPermission()
		syncUserActions()
		periodicSyncing()
	})
	.catch(function(error) {
		// console.error('Service Worker registration failed:', error);
	});
}

async function periodicSyncing () {
    const swRegistration = await navigator.serviceWorker.ready;
    try {
      const status = await navigator.permissions.query({
        name: 'periodic-background-sync',
      });

      if (status.state === 'granted') {
        await swRegistration.periodicSync.register('sync-updates', {
          minInterval: 24 * 60 * 60 * 1000 // 24 hours
        });
        console.log('Periodic background sync registered.');
      } else {
        console.log('Periodic Background Sync permission denied.');
      }
    } catch (err) {
      console.error('Error registering periodic sync:', err);
    }
}



// Function to save user action and register sync if offline
function saveUserAction(data) {
    if ('serviceWorker' in navigator && 'SyncManager' in window) {
        navigator.serviceWorker.ready.then(function(registration) {
            return registration.sync.register('sync-user-action');
        }).catch(function() {
            // If SyncManager is not supported or fails, store data locally for manual sync
            storeDataOffline(data);
        });

		if ('permissions' in navigator) {
			navigator.permissions.query({ name: 'periodic-background-sync' })
				.then((status) => {
					if (status.state === 'denied') {
						console.log('Periodic background sync permission denied');
					}
				});
			}
    } else {
        // Fallback if Service Worker or SyncManager is not available
        storeDataOffline(data);
    }
}
if ('SyncManager' in window) {
	navigator.serviceWorker.ready.then((registration) => {
	  return registration.sync.register('sync-updates');
	});
  }

// Function to store user data offline (using localStorage as an example)
function storeDataOffline(data) {
    let offlineData = getOfflineData();
    offlineData.push(data);
    localStorage.setItem('offlineData', JSON.stringify(offlineData));
}

// Fetch offline data from localStorage
function getOfflineData() {
    return JSON.parse(localStorage.getItem('offlineData') || '[]');
}

// Sync data manually when the network is back online
window.addEventListener('online', function() {
    syncUserActions();
});

// Function to manually sync user actions if Background Sync API is unavailable	
function syncUserActions() {
    let offlineData = getOfflineData();
    if (offlineData && offlineData.length > 0) {
        fetch('/wp-json/api/v1/data', {
            method: 'POST',
            body: JSON.stringify(offlineData),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(response => {
            if (response.ok) {
                console.log('Data synced successfully');
                clearOfflineData();
            }
        }).catch(err => {
            console.error('Sync failed:', err);
        });
    }
}

// Clear offline data after sync
function clearOfflineData() {
    localStorage.removeItem('offlineData');
}

// Convert the VAPID public key to a Uint8Array
function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

// Function to handle external links in PWA
function handleExternalLinks() {
    // Check if the app is running in standalone mode (PWA installed)
    // if (window.matchMedia('(display-mode: standalone)').matches) {
        // Select all links
        document.querySelectorAll('a').forEach(link => {
            // Check if the link is external
            if (link.hostname !== window.location.hostname) {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    // Open the link in the device's default browser
                    window.open(link.href, '_system');
                });
            }
        });
    // }
}

// Call the function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', handleExternalLinks);
  