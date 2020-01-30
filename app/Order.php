<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot('count')->withTimeStamps();
    }

    public function calculate()
    {
    	$sum = 0;
    	foreach($this->products as $product) {
    		$sum += $product->getPriceCount();
    	}

    	return $sum;
    }
}
