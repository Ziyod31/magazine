<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
	protected $fillable = ['code', 'name', 'description', 'image', 'price', 'count', 'category_id'];

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