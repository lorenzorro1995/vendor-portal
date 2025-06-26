<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class VendorStatusChanged extends Notification
{
    use Queueable;

    protected $vendor;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $vendor)
    {
        $this->vendor = $vendor;
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
        $status = $this->vendor->status;
        $subject = "Your Vendor Application Status has been Updated";
        $greeting = "Hello, {$this->vendor->name}!";
        $line = "Your application to become a vendor has been {$status}.";

        if ($status === 'approved') {
            $actionText = 'Go to Dashboard';
            $actionUrl = url('/dashboard');
            return (new MailMessage)
                ->subject($subject)
                ->greeting($greeting)
                ->line($line)
                ->line('You can now access your vendor dashboard.')
                ->action($actionText, $actionUrl);
        }

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->line($line)
            ->line('If you have any question, please contact our support team.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
