<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{	
 protected $table = 'company';
     protected $fillable = [
        'name',
        'logo',
        'banner',
        'type',
        'city',
        'state',
        'country',
        'address',
        'pincode',
        'industry_id',
        'email',
        'phone',
        'about_company',
        'website',
        'is_active',
        'created_at',
        'updated_at'
    ];
     public function getLogoAttribute($val){
        return env('APP_URL')."walkin/public/company/".$val;
    }
	/*  public function getBannerAttribute($val){
        return env('APP_URL')."walkin/public/company/".$val;
    } */

}
