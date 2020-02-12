<?php

namespace App;

use App\Product;
// use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected $fillable = ['user_id'];
    
    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot('count')->withTimeStamps();
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function calculate()
    {
    	$sum = 0;
    	foreach($this->products as $product) {
    		$sum += $product->getPriceCount();
    	}

    	return $sum;
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
