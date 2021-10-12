<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function city()
    {
        return $this->belongsTo(City::Class);
    }
    use HasFactory;
    protected $fillable = [
        'name',
        'lat',
        'long',
        'status',
        'city_id'
    ];
}
