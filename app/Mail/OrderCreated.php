<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $order;

    public function __construct($name, Order $order)
    {
        $this->name = $name;
        $this->order = $order;
    }


    public function build()
    {
        $fullPrice = $this->order->calculate();
        return $this->view('inc.mail', [
            'name' => $this->name,
            'order' => $this->order,
            'fullPrice' => $fullPrice
        ]);
    }
}
