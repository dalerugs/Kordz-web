<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineup extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'user_id','name'];
}
