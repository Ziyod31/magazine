<?php

namespace App;

use App\Essense;
use App\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyOption extends Model
{
    protected $fillable = ['property_id', 'name'];

    public function property()
    {
    	return $this->belongsTo(Property::class);
    }

    public function essenses()
    {
    	return $this->belongsToMany(Essense::class);
    }
}
