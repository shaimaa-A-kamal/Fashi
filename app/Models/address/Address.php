<?php

namespace App\Models\Address;
use App\Model\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function getFloorAttribute($value){
        return ucfirst($value);
    }

    public function getBuildingAttribute($value){
        return ucfirst($value);
    }

    public function getStreetAttribute($value){
        return ucfirst($value);
    }

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function region(){
        return $this->belongsTo(Region::Class);
    }

    use HasFactory;
    protected $fillable = [
        'street',
        'building',
        'floor',
        'flat',
        'status',
        'defaultAddress',
        'notes',
        'region_id',
        'user_id',
    ];
}
