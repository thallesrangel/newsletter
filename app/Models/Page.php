<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'page';
    
    protected $fillable = [
        'title',
        'subtitle',
        'placeholder_email',
        'button_name'
    ];
}
