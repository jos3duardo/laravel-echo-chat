<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * @var Message
     */
    public $message;
    public $user;

    /**
     * SendMessage constructor.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
        $this->user = Auth::user();
    }

    public function broadcastOn()
    {
        return new PresenceChannel("room.{$this->message->romm_id}");
    }
}
