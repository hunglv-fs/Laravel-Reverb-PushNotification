<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class PublicNotification implements ShouldBroadcast
{
    use SerializesModels;

    public $title;
    public $body;

    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body  = $body;
    }

    public function broadcastOn()
    {
        return new Channel('public-notification');
    }

     public function broadcastWith()
    {
        return ['body' => $this->body, 'title' => $this->title];
    }
}
