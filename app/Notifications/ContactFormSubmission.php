<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use stdClass;

class ContactFormSubmission extends Notification
{

    /**
     * The data from the contact form.
     *
     * @var stdClass
     */
    protected $formData;
    
    /**
     * Create a new notification instance.
     * 
     * @param stdClass $formData
     *
     * @return void
     */
    public function __construct(stdClass $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * 
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * 
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $delimiter = '//n//';
        $mail = (new MailMessage)
                ->from($this->formData->email, $this->formData->name)
                ->subject('New Enquiry')
                ->salutation($this->formData->name);
        $messages = explode($delimiter, str_replace('<br />', $delimiter, nl2br($this->formData->message)));
        foreach ($messages as $message) {
            $mail = $mail->line($message);
        }
        
        return $mail;
    }
}
