<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Delivery channels
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Email notification
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Selamat Datang')
            ->greeting('Halo ' . $notifiable->name . ' 👋')
            ->line('Selamat datang di aplikasi Mini Market Pak Jusman.')
            ->line('Akun kamu berhasil dibuat.')
            ->action('Masuk ke Dashboard', url('/dashboard'))
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    /**
     * Database notification
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Selamat datang di Mini Market Pak Jusman!',
        ];
    }
}