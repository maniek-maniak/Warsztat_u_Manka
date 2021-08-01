<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'carPlateNumber',
        'brand',
        'modell',
        'yearOfProduction',
        'created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    // public function user() {
    //     return $this->belongsToMany(User::class, 'cars_has_users', 'car_id', 'user_id')->withtimestamps();
    // }
    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function visits() {
        return $this->hasMany(Visit::class, 'car_id');
    }



}
