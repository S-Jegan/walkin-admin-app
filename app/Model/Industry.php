<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{	
 protected $table = 'industry';
     protected $fillable = [
        'name',
        'is_active',
        'created_at',
        'updated_at'
    ];
}
