const COOKIE_NAME = 'dla_notifications_seen';
const COOKIE_DAYS = 365;
let notifications = null;

function passedTime(dateString) {
  const now = new Date();
  const date = new Date(dateString);
  const diff = Math.floor((now - date) / 1000);

  if (diff < 60) return `${diff} second${diff !== 1 ? 's' : ''} ago`;
  const mins = Math.floor(diff / 60);
  if (mins < 60) return `${mins} minute${mins !== 1 ? 's' : ''} ago`;
  const hours = Math.floor(mins / 60);
  if (hours < 24) return `${hours} hour${hours !== 1 ? 's' : ''} ago`;
  const days = Math.floor(hours / 24);
  if (days < 30) return `${days} day${days !== 1 ? 's' : ''} ago`;
  const months = Math.floor(days / 30);
  if (months < 12) return `${months} month${months !== 1 ? 's' : ''} ago`;
  const years = Math.floor(months / 12);
  return `${years} year${years !== 1 ? 's' : ''} ago`;
}

function readSeenIdsFromCookie() {
  try {
    const match = document.cookie.split('; ').find((row) => row.startsWith(COOKIE_NAME + '='));
    if (!match) return [];
    const raw = decodeURIComponent(match.split('=')[1] || '');
    if (!raw) return [];
    const parsed = JSON.parse(raw);
    if (Array.isArray(parsed)) return parsed;
    if (typeof parsed === 'string') return parsed.split(',').filter(Boolean);
  } catch (e) {
    // ignore and fallback to empty list
  }
  return [];
}

function writeSeenIdsToCookie(ids) {
  try {
    const value = encodeURIComponent(JSON.stringify(Array.from(new Set(ids))));
    const expires = new Date(Date.now() + COOKIE_DAYS * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie = `${COOKIE_NAME}=${value}; expires=${expires}; path=/; SameSite=Lax`;
  } catch (e) {
    console.warn('Failed to write notification cookie', e);
  }
}

function addIdToSeenCookie(id) {
  if (!id) return;
  try {
    const ids = readSeenIdsFromCookie();
    if (!ids.includes(id)) {
      ids.push(id);
      if (ids.length > 200) ids.splice(0, ids.length - 200);
      writeSeenIdsToCookie(ids);
    }
  } catch (e) {
    console.warn('Failed to update seen notification cookie', e);
  }
}

function renderNotificationTile(args) {
  return `
    <div class="tile-block tile-notification blured-background box px-5 py-5 items-center">
      <div class="blured-content flex items-center justify-between w-full">
        <div class="tile-content-info w-[calc(100%-30px)]">
          <div class="tile-title-wrapper pb-2 flex items-center gap-[10px]">
            ${!args.readed ? `<div class="tile-unread-indicator bg-[#FAB400] w-2 h-2 rounded-[50%]"></div>` : ''}
            <h3 class="tile-title leading-[20px] ">${args.app_title ?? ''}</h3>
          </div>
          <div class="tile-message truncate text-[12px] leading-[18px] whitespace-nowrap overflow-hidden text-ellipsis">${args.app_text ?? ''}</div>
          <span class="tile-created-at text-[12px] leading-[18px] opacity-70">${passedTime(args.created_at) ?? ''}</span>
        </div>
        <i class="tile-notification-link icon-arrow-right relative opacity-50"></i>
      </div>
      <a href="${`/overview/notifications/${args.id}` ?? '#'}" class="tile-content-link absolute w-full h-full m-[-20px]">
      </a>
    </div>
  `;
}

async function fetchNotifications() {
  const signElement = document.getElementById('notification-sign');

  try {
    const resp = await fetch('/?dla_notifications=1', {
      method: 'GET',
      credentials: 'same-origin',
      headers: {
        Accept: 'application/json'
      }
    });

    if (resp.ok) {
      const data = await resp.json();
      const seenIds = readSeenIdsFromCookie();

      notifications = [];

      data.items.forEach((n) => {
        if (!n.sent_at) return;
        notifications.push({
          ...n,
          readed: seenIds.includes(n.id.toString())
        });
      });
      if (notifications.some((n) => !n.readed)) {
        signElement?.classList.remove('hidden');
      }

      const container = document.getElementById('js-notifications-list');

      if (!container) {
        console.warn('js-notifications-list not found!');
        return;
      }

      container.innerHTML = notifications.map((notification) => renderNotificationTile(notification)).join('');
    } else {
      console.warn('Failed to fetch notifications, status:', resp.status);
    }
  } catch (err) {
    console.warn('Error fetching notifications:', err);
  }
}

document.addEventListener('DOMContentLoaded', fetchNotifications);

async function renderNotificationDetail(slug) {
  if (!notifications) {
    await fetchNotifications();
  }

  const detailContainer = document.getElementById('notification-detail');
  if (!detailContainer) {
    console.warn('notification-detail container not found!');
    return;
  }

  const notification = notifications.find((n) => {
    addIdToSeenCookie(slug);
    return n.id == slug;
  });

  detailContainer.innerHTML = `
    <div class="notification-header">
      <a href="/overview/notifications" class="notifications-link">
        <i class="icon-arrow-left notification-back-icon"></i>
      </a>
      <h1 class="notification-header-title">${notification ? notification.app_title : 'Notification Not Found'}</h1>
    </div>
    <div class="notification-wrapper">
      <p class="notification-time" >${passedTime(notification ? notification.created_at : '')}</p>
      <div class="notification-content">${notification ? notification.app_text : 'The requested notification could not be found.'}</div>
    </div>
  `;
}

const observer = new MutationObserver(function (_mutationsList, observer) {
  const detail = document.getElementById('notification-detail');
  if (detail) {
    const path = window.location.pathname;

    const parts = path.split('/');
    const slug = parts[parts.length - 1] || parts[parts.length - 2];
    renderNotificationDetail(slug);
    observer.disconnect();
  }
});

observer.observe(document.body, { childList: true, subtree: true });
