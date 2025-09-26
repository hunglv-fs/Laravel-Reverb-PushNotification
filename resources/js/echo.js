import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     wsHost: import.meta.env.VITE_REVERB_HOST,
//     wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
//     wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    wssPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: false,
    enabledTransports: ['ws', 'wss'],
});

// ✅ CÁCH ĐÚNG - Sử dụng Pusher connection events
window.Echo.connector.pusher.connection.bind('connected', () => {
    console.log('✅ Connected to Reverb via Pusher protocol!');
});

window.Echo.connector.pusher.connection.bind('error', (error) => {
    console.error('❌ Reverb connection error:', error);
});

window.Echo.connector.pusher.connection.bind('disconnected', () => {
    console.log('🔌 Disconnected from Reverb');
});

// Test state hiện tại
console.log('Connection state:', window.Echo.connector.pusher.connection.state);
console.log("Echo in echo.js:", window.Echo);

window.Echo.channel('public-notification')
    .listen('PublicNotification', (e) => {
        console.log("New notif:", e.title, e.body);

        // update UI
        const list = document.getElementById("notif-list");
        list.innerHTML = `<div class="notif-item">
                            <strong>${e.title}</strong>
                            <div>${e.body}</div>
                        </div>` + list.innerHTML;

        const count = document.getElementById("notif-count");
        count.innerText = parseInt(count.innerText) + 1;
    });