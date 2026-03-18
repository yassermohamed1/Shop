<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via(object $notifiable): array
    {

        return ['database', 'broadcast'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New order # {$this->order->number}")
            ->line("A new order (#{$this->order->number})")
            ->action('View Order', url('/orders/' . $this->order->id))
            ->line('Thank you for using our application!');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'order_number' => $this->order->number,
            'message' => 'New order created'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'order_number' => $this->order->number,
            'message' => 'New order created'
        ];
    }
}
