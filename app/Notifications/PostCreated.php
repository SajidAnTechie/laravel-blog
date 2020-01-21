<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;

class PostCreated extends Notification
{
    use Queueable;

    public $user, $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $post)
    {
        //
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
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
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */


    public function toDatabase($notifiable)
    {

        // $post_title  = $this->user_name;
        return [
            'data' => $this->user->name . " " . 'commented on your post',
            'post_id' => $this->post->id,
        ];
    }

    public function toBroadcast($notifiable)
    {
        // $post_title  = $this->user_name;
        return new BroadcastMessage([
            'data' => $this->user->name  . " " . 'commented on your post',
            'post_id' => $this->post->id,
        ]);
    }

    public function BroadcastAs()
    {
        return 'Post Created';
    }
}
