<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
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
    public function toMail($notifiable)
    {
        $addr = $this->order->billingaddress;

        return (new MailMessage)
            ->subject("New Order #{$this->order->number}")

            ->greeting("Hi {$notifiable->name},")
            ->line("A new order (#{$this->order->number}) created by {$addr->name}")
            ->action('View Order', url('/'))
            ->line('Thank you for using our application!');
    }
    public function toDatabase($notifiable)
    {
        $addr = $this->order->billingAddress;

        return [
            'body' => "A new order (#{$this->order->number}) created by {$addr->name}.",
            'icon' => 'fas fa-file',
            'url' => url('/dashboard'),
            'order_id' => $this->order->id,
        ];
    }

    public function toBroadcast($notifiable)
    {
        
        $addr = $this->order->billingAddress;
        return new BroadcastMessage([
            'body' => "A new order (#{$this->order->number}) created by {$addr->name}.",
            'icon' => 'fas fa-file',
            'url' => url('/dashboard'),
            'order_id' => $this->order->id,
        ]);
    }
}
