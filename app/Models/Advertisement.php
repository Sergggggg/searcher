<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [

    'advertise_position', 
    'cost_per_day',
    'cost_per_week',
    'cost_per_month'


    ];

    public function sites() {
    
    	return $this->belongsToMany(Advertisement::class, 'advertise_position', 'advertisement_id', 'site_id');
	
	}
}
