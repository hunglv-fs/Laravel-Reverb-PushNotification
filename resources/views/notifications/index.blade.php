<!DOCTYPE html>
<html>
<head>
    <title>Realtime Notifications</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1>Realtime Notifications</h1>

    <div id="notification-ui">
        <span id="notif-count">{{ $notifications->count() }}</span>
        <div id="notif-list">
            @foreach($notifications as $n)
                <div class="notif-item">
                    <strong>{{ $n->title }}</strong>
                    <div>{{ $n->body }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", () => {
    if (!window.Echo) {
        console.error("Echo instance not found!");
        return;
    }

    console.log("Echo instance:", window.Echo);

    // Hàm check kết nối WebSocket mỗi 3 giây nếu chưa kết nối
    function waitForConnection(callback, interval = 3000) {
        // console.log('Connection state111111111111111111111:', window.Echo.connector.pusher.connection.state);
        // if (window.Echo.connector.pusher.connection.state == 'connected') {
        //     // WebSocket đã kết nối
        //     callback();
        // } else {
        //     console.log("WebSocket not ready, retrying in " + interval/1000 + "s...");
        //     setTimeout(() => waitForConnection(callback, interval), interval);
        // }
    }

    waitForConnection(() => {
        console.log("WebSocket connected, subscribing to channel...");

        window.Echo.channel('public-notification')
            .listen('PublicNotification', (e) => {
                console.log("New notif:", e.title, e.body);

                const list = document.getElementById("notif-list");
                list.innerHTML = `<div class="notif-item">
                                    <strong>${e.title}</strong>
                                    <div>${e.body}</div>
                                  </div>` + list.innerHTML;

                const count = document.getElementById("notif-count");
                count.innerText = parseInt(count.innerText) + 1;
            });
    });
});
</script>
</body>
</html>
