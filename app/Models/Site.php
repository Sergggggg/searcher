<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;


    public function advertisements(){
    
    	return $this->belongsToMany(Advertisement::class, 'sites_advertisements', 'site_id', 'advertisement_id');
	
	}

	public function rents(){

		return $this->hasMany(Rent::class, 'site_id');
	}
}
