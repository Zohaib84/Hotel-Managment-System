<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailNotification extends Notification
{
    use Queueable;
    private $details;

    /**
     * Create a new notification instance.
     */
    public function __construct($details)
    {
        $this->details=$details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting($this->details['greeting'] ?? 'Hello!')
            ->line($this->details['body'] ?? '')
            ->action($this->details['action_text'] ?? 'Visit', $this->details['action_url'] ?? url('/'))
            ->line($this->details['endline'] ?? 'Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            // Any data you want to return as an array, for example:
            'greeting' => $this->details['greeting'] ?? 'Hello!',
            'body' => $this->details['body'] ?? '',
            'action_text' => $this->details['action_text'] ?? 'Visit',
            'action_url' => $this->details['action_url'] ?? url('/'),
            'endline' => $this->details['endline'] ?? 'Thank you!',
        ];
    }
}
