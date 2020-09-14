<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table = "billing";
    protected $fillable = ['full_name','address','city','state','postcode','country','phone','email','user_id'];

}
