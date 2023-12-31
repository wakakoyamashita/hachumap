<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventHistory extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'event_id' => 'required',
        'edited_at' => 'required',
    );
    protected $table = 'events_histories';
}
