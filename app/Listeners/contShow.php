<?php

namespace App\Listeners;
use App\Events\visit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class contShow
{
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
     * @param  object  $event
     * @return void
     */
    public function handle(visit $event)
    {
        if (!session()->has('videoIsVisited')) {
            $this->updateViewr($event->visitor);
        } else {
            return false;
        }
    }
    function updateViewr($visitor)
    {
        $visitor->viewers = $visitor->viewers + 1;
        $visitor->save();
        session()->put('videoIsVisited', $visitor->id);
    }
}
