<?php

namespace App\Http\Middleware;

use App\Order;
use Closure;

class BasketCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $order = session('order');

        if(!is_null($order) && $order->getFullPrice() > 0) {
            return $next($request);
        }

        session()->forget('order');

        session()->flash('warning', 'Ваша корзина пуста!');
        return redirect()->route('index');
    }
}
