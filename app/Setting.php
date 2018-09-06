<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'user_id','setting_key','value'];
}
