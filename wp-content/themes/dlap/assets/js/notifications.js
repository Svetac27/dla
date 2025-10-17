const notifications = [
  {
    id: 'recent_updates',
    slug: 'recent-updates',
    title: 'Recent Updates',
    message:
      'DLA Piper continues to share timely insights and updates for clients, colleagues, and partners across industries. Recent announcements highlight the firm’s work in supporting businesses navigating evolving regulations, market shifts, and global challenges.\n\nThe firm has been active in publishing quick analyses of policy changes, providing practical takeaways for businesses operating in complex legal landscapes. These updates are designed to be concise, accessible, and directly relevant to decision makers.\n\nIn addition, DLA Piper regularly announces upcoming events, client alerts, and thought leadership pieces. These resources aim to help clients anticipate and respond to developments that could impact their operations.\n\nBy using this app, readers can stay connected to the latest news and announcements in one convenient place. Each notification provides a quick entry point into the broader set of insights available through DLA Piper’s global platform.\n',
    created_at: '2025-10-16T13:00:00Z',
    readed: false
  },
  {
    id: 'legal_brief',
    slug: 'legal-brief',
    title: 'Legal Brief',
    message:
      "A quick overview of today's most relevant legal news and updates from DLA Piper. Stay informed with concise summaries of key developments, regulatory changes, and industry insights that matter to you.",
    created_at: '2025-10-16T08:30:00Z',
    readed: true
  },
  {
    id: 'event_recap',
    slug: 'event-recap',
    title: 'Event Recap',
    message:
      'Highlights from the recent DLA Piper hosted event, including key takeaways, speaker insights, and next steps for attendees. Stay connected with the latest from our events.',
    created_at: '2025-10-11T12:30:00Z',
    readed: true
  }
];

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

function renderNotificationTile(args) {
  return `
    <div class="tile-block tile-notification blured-background box px-5 py-5 items-center">
      <div class="blured-content flex items-center justify-between w-full">
        <div class="tile-content-info w-[calc(100%-30px)]">
          <div class="tile-title-wrapper pb-2 flex items-center gap-[10px]">
            ${!args.readed ? `<div class="tile-unread-indicator bg-[#FAB400] w-2 h-2 rounded-[50%]"></div>` : ''}
            <h3 class="tile-title leading-[20px] ">${args.title ?? ''}</h3>
          </div>
          <span class="tile-message block text-[12px] leading-[18px] whitespace-nowrap overflow-hidden text-ellipsis">${args.message ?? ''}</span>
          <span class="tile-created-at text-[12px] leading-[18px] opacity-70">${args.created_at ?? ''}</span>
        </div>
        <a href="${args.link ?? '#'}" class="tile-content-link text-[12px] leading-[18px] w-[100px] h-full flex items-center justify-end">
          <i class="tile-notification-link icon-arrow-right relative opacity-50"></i>
        </a>
      </div>
    </div>
  `;
}

function fetchNotifications() {
  const signElement = document.getElementById('notification-sign');

  if (notifications.some((n) => !n.readed)) {
    signElement?.classList.remove('hidden');
  }

  const container = document.getElementById('js-notifications-list');

  if (!container) {
    console.warn('js-notifications-list not found!');
    return;
  }

  container.innerHTML = notifications
    .map((notification) =>
      renderNotificationTile({
        title: notification.title,
        message: notification.message,
        created_at: passedTime(notification.created_at),
        readed: notification.readed,
        link: `/notification`
      })
    )
    .join('');
}

document.addEventListener('DOMContentLoaded', fetchNotifications);
