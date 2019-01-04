<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use stdClass;

class NewEnquiry extends Notification
{

    /**
     *
     * @var stdClass
     */
    protected $emailData;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(stdClass $emailData)
    {
       
        $this->emailData = $emailData;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->line('Name: ' . $this->emailData->name)
                    ->line('Email Address: ' . $this->emailData->email)
                    ->line('Message: ' . $this->emailData->message)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
