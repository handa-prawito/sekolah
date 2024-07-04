<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPassword extends Notification
{
    use Queueable;
    private $token, $email;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
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
        $resetUrl = url(config('app.url').route('password.reset', [
            'token' => $this->token,
            'email' => $this->email,
        ], false));

        return (new MailMessage)
        ->subject('Notifikasi Perubahan Kata Sandi')
        ->from('handaprawito100@gmail.com', 'MI Wachid Hasjim')
        ->line('Anda menerima email ini karena kami menerima permintaan untuk merubah kata sandi akun Anda.')
        ->action('Reset Kata Sandi', $resetUrl)
        ->line('Jika Anda tidak meminta perubahan kata sandi, tidak perlu melakukan tindakan lebih lanjut.')
        ->salutation('Hormat kami, MI Wachid Hasjim');
    

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
