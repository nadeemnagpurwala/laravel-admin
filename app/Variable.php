<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $fillable = [
        'variable_name', 'variable_code', 'variable_plain_value', 'variable_hrml_value',
    ];
}
