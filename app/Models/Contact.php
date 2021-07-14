<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'fullname' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'postcode' => 'required',
        'address' => 'required',
        'option' => 'required'
    );
}
