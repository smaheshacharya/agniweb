<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = "shipping";
    protected $fillable = ['full_name','address','city','state','postcode','country','phone','email','user_id'];
}
