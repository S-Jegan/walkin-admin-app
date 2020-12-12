<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
     protected $fillable = [
        'id',
        'key',
        'value',
        'is_active',
        'created_at',
        'updated_at'
    ];
}
