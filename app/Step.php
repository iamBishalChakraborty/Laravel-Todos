<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'steps', 'todo_id'
    ];
}
