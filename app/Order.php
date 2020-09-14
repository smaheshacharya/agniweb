<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['order_number','order_date','total','user_id','payment_method','transaction_id','image','product_name','order_notes'];

}
