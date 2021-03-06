<?php

namespace App;

use App\Category;
use App\Classes\CurrencyConversion;
use App\Essense;
use App\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes; 

	protected $fillable = [ 'name', 'code', 'description', 'image', 'category_id', 'price', 'hit', 'new', 'recommend', 'count'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function essenses()
	{
		return $this->hasMany(Essense::class);
	}

	public function properties()
	{
		return $this->belongsToMany(Property::class, 'property_product')->withTimestamps();
	}

	public function scopeByCode($query, $code)
	{
		return $query->where('code', $code);
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

	public function isAvailable()
	{
		return !$this->trashed() && $this->count > 0;
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

	public function getPriceAttribute($value)
	{
		return round(CurrencyConversion::convert($value), 2);
	}
}