<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['token_id', 'a_value', 'b_value', 'operator'];
}
