<?php

namespace App\Listeners;

use App\Events\ProjectCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddHistory
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
     * @param  ProjectCreatedEvent  $event
     * @return void
     */
    public function handle(ProjectCreatedEvent $event)
    {
        //
    }
}
