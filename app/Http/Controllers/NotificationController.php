<?php
namespace App\Http\Controllers;

use App\Models\NotificationMessage;
use App\Events\PublicNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = NotificationMessage::latest()->take(10)->get();
        return view('notifications.index', compact('notifications'));
    }

    public function send()
    {
        $num = rand(1, 100);
        $notif = NotificationMessage::create([
            'title' => 'System Update'. $num,
            'body'  => 'A new version has been deployed!',
        ]);

        event(new PublicNotification($notif->title, $notif->body));
        return "Notification sent!";
    }
}

