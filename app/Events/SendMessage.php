<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendMessage implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var Message
     */
    public $message;
    public $user;

    /**
     * SendMessage constructor.
     * @param $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
        $this->user = Auth::user();
    }

    public function broadcastOn()
    {
        return new Channel("room.{$this->message->romm_id}");
    }
}
