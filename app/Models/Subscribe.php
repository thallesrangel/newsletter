<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'subscribe';
    
    protected $fillable = [
        'email',
        'status'
    ];
}