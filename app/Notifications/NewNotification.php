<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;   // queueable
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $title;
    public $body;
    public $meta;

    public function __construct(string $title, string $body, array $meta = [])
    {
        $this->title = $title;
        $this->body  = $body;
        $this->meta  = $meta;
    }

    // choose channels: database + broadcast
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    // For database channel (optional)
    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->title,
            'body'  => $this->body,
            'meta'  => $this->meta,
            'sent_at' => now(),
        ];
    }

    // For broadcast channel
    public function toBroadcast($notifiable)
    {
        // BroadcastMessage will be serialized to the frontend
        return new BroadcastMessage([
            'title' => $this->title,
            'body'  => $this->body,
            'meta'  => $this->meta,
            'sent_at' => now()->toDateTimeString(),
        ]);
    }

    // Optional: notification array representation
    public function toArray($notifiable)
    {
        return [
            'title' => $this->title,
            'body'  => $this->body,
        ];
    }
}
