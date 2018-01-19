<?php

namespace App\Listeners;

use App\Events\ProjectCreatedEvent as ProjectCreatedEvent;
use App\Notifications\ProjectCreatedNotification as ProjectCreatedNotification;
use App\Model\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotification
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
     * @param ProjectCreatedEvent $event
     * @return void
     */
    public function handle(ProjectCreatedEvent $event)
    {
        /**
         * @var User $user
         */
        $user = $event->user;
        $user->notify(new ProjectCreatedNotification($event->project));
    }
}
