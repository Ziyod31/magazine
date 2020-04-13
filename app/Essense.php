<?php

namespace App;

use App\Product;
use App\PropertyOption;
use Illuminate\Database\Eloquent\Model;

class Essense extends Model
{
    protected $fillable = ['product_id', 'count', 'price'];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

        public function options()
    {
    	return $this->belongsToMany(PropertyOption::class)->withTimestamps();
    }
}
