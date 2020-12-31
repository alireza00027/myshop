<?php

namespace App\Events;

use App\Cart;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserSetCart
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $cart;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Cart $cart
     */
    public function __construct(User $user , Cart $cart)
    {
        $this->user=$user;
        $this->cart=$cart;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
