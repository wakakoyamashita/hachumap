<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'event_name' => 'required',
        'place' => 'required',
    );
    
    public function events_histories()
    {
        return $this->hasMany('App\Models\EventHistory');
    }
}