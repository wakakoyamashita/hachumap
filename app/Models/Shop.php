<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'shop_name' => 'required',
        'shop_url' => 'required',
        'description' => 'required',
    );
}
