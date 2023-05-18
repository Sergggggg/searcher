<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

    'rent_place_site', 
    'cost_per_rent',
    'date_start',
    'date_end',
    'user_id'


    ];
}
