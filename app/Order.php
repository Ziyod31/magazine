<?php

namespace App;

use App\Product;
// use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];
    
    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot('count')->withTimeStamps();
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

    public static function eraseFullPrice()
    {
        session()->forget('full_order_sum');
    }

    public static function changeFullPrice($changeSum)
    {
        $sum = self::getFullPrice() + $changeSum;
        session(['full_order_sum' => $sum]);
    }

    public static function getFullPrice()
    {
        return session('full_order_sum', 0);
    }

    public function saveOrder($name, $phone)
    {
        if($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }

        else {
            return false;
        }
        
    }
}
