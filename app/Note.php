<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Note extends Eloquent
{
    protected $fillable = [
        'content', 'user_id'
    ];
}
