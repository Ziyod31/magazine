<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
	protected $fillable = [ 'name', 'code', 'description', 'image', 'category_id', 'price', 'hit', 'new', 'recommend'];

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

	public function scopeHit($query)
	{
		return $query->where('hit', 1);
	}

	public function scopeNew($query)
	{
		return $query->where('new', 1);
	}

	public function scopeRecommend($query)
	{
		return $query->where('recommend', 1);
	}

	public function setHitAttribute($value)
	{
		$this->attributes['hit'] = $value === 'on' ? 1 : 0;
	}

	public function setNewAttribute($value)
	{
		$this->attributes['new'] = $value === 'on' ? 1 : 0;
	}

	public function setRecommendAttribute($value)
	{
		$this->attributes['recommend'] = $value === 'on' ? 1 : 0;
	}

	public function isHit()
	{
		return $this->hit === 1;
	}

	public function isNew()
	{
		return $this->new === 1;
	}

	public function isRecommend()
	{
		return $this->recommend === 1;
	}
}