<?php

namespace App;

use App\Currency;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'currency_id', 'sum'];
    
    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot(['count', 'price'])->withTimeStamps();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function calculate()
    {
    	$sum = 0;

    	foreach($this->products()->withTrashed()->get() as $product) {
    		$sum += $product->getPriceCount();
    	}

    	return $sum;
    }

    public function getFullPrice()
    {
        $sum = 0;

        foreach($this->products as $product) {
            $sum += $product->price * $product->countOrder;
        }

        return $sum;
    }

    public function saveOrder($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->status = 1;
        $this->sum = $this->getFullPrice();

        $products= $this->products;
        $this->save();

        foreach($products as $productInOrder) {
            $this->products()->attach($productInOrder, [
                'count' => $productInOrder->countOrder,
                'price' => $productInOrder->price,
            ]);
        }

        session()->forget('order');
        return true;
    }
}
