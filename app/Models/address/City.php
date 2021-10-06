<?php

namespace App\Models\Address;

// use App\Models\address\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function regions()
    {
        return $this->hasMany(Region::class);
    }


    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
}
