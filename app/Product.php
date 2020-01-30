<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function getPriceCount()
	{
		if(!is_null($this->pivot)) {
			return $this->pivot->count * $this->price;
		}

		return $this->price;
	}
}