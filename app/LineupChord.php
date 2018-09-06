<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineupChord extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'user_id','lineup_id','chord_id'];
}
