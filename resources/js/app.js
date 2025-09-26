console.log(">>> app.js loaded <<<");
import './bootstrap';

// import Echo from 'laravel-echo';
// console.log("Echo 111:", Echo);
// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     host: window.location.hostname + ':8080', // port Reverb đang chạy
// });

// console.log("Echo instance1111:", window.Echo);
//     window.Echo.channel('public-notification')
//         .listen('PublicNotification', (e) => {
//             console.log("New notif:", e.title, e.body);

//             // update UI
//             const list = document.getElementById("notif-list");
//             list.innerHTML = `<div class="notif-item">
//                                 <strong>${e.title}</strong>
//                                 <div>${e.body}</div>
//                             </div>` + list.innerHTML;

//             const count = document.getElementById("notif-count");
//             count.innerText = parseInt(count.innerText) + 1;
//         });
// function showToast(title, body) {
//     // Basic toast; replace with your UI component (Toastify, Bootstrap, etc.)
//     const toast = document.createElement('div');
//     toast.className = 'simple-toast';
//     toast.innerHTML = `<b>${title}</b><div>${body}</div>`;
//     document.body.appendChild(toast);
//     setTimeout(()=> toast.remove(), 6000);
// }
