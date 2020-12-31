<?php

namespace App\Listeners\UserSetCart;

use App\Events\UserSetCart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCart implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSetCart  $event
     * @return void
     */
    public function handle(UserSetCart $event)
    {
        $event->cart->setUser($event->user);
        return redirect()->route('carts.show');
    }
}
