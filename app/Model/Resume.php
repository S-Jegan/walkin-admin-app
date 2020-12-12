<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{	
 protected $table = 'resume';
     protected $fillable = [
        'name',
        'category_id',
        'designation',
        'pdf_url',
        'word_url',
        'is_active',
        'created_at',
        'updated_at'
    ];
     public function getPdfUrlAttribute($val){
        return env('APP_URL')."walkin/public/resume/".$val;
    }
	 public function getWordUrlAttribute($val){
        return env('APP_URL')."walkin/public/resume/".$val;
    }
	
	
    public function category(){
        return $this->hasOne(Category::class, 'id','category_id');
   } 
}
