<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
     protected $fillable = [
        'name',
        'img_url',
        'is_active',
        'created_at',
        'updated_at'
    ];
    public function getImgUrlAttribute($val){
        return env('APP_URL')."walkin/public/category/".$val;
    }
}
