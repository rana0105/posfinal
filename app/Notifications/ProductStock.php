<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use \Carbon\Carbon;

class ProductStock extends Notification
{
    use Queueable;

    protected $stocks;

    public function __construct($stocks)
    {
        $this->stocks = $stocks;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'stocks'=>$this->stocks,
            'user'=> $notifiable
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
