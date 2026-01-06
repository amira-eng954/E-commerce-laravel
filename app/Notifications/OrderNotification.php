<?php

namespace App\Notifications;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;
 public $product;
    /**
     * Create a new notification instance.
     */
    public function __construct( Product $product)
    {
        $this->product=$product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast','mail'];
    }
// e94a87341ef813
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->from('amira@amira.com')
                    ->subject("product name {$this->product->title}")
                    ->greeting("hi, { $notifiable->name }")
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

//////////////////////////////////////////////////
     public function toDatabase(object $notifiable)
     {
        return[
            'data'=>"amira",
            'product'=>$this->product->title

        ];
     }
    // jsonالل داخل جدول الاشعارات الل عملته  هتكون هلى هيئه dataدى هتتخزن جوا العمود 
     ///////////////////////////////////


      public function toBroadcast(object $notifiable)
     {
       return new BroadcastMessage([
        'data' => "ali",
        'section' => $this->product->title,
    ]);
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
