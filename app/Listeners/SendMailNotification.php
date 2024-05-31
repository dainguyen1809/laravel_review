<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Notifications\UserRegisteredNotificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendMailNotification
{

    /**
     * Handle the event.
     */
    public function handle(UserRegisteredEvent $event) : void
    {
        // su dung user cua event
        Notification::send($event->user, new UserRegisteredNotificationEmail($event->user));

    }
}
