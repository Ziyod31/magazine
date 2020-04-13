<?php

namespace App;

use App\Product;
use App\PropertyOption;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name'];

    public function options()
    {
    	return $this->hasMany(PropertyOption::class);
    }

    public function products()
	{
		return $this->belongsToMany(Product::class);
	}
}
