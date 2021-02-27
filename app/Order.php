<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function address()
    {
    	return $this->belongsTo(Useraddress::class, 'address_id', 'address_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function cart()
    {
    	return $this->hasOne(Carts::class, 'cart_id', 'order_id');
    }

    public function product()
    {
        return $this->hasMany(Carts::class, 'order_id', 'ord_id');
    }

    public function getMyOrderStatusAttribute($value) {
        if($value == 1){
            return 'Booked';
        }
        elseif($value['order_status']==2){
            return 'Complete';
        }
        elseif($value == 3){
            return 'Cancel';
        }
        elseif($value == 4){
            return 'Ongoing';
        }
        elseif($value == 5){
            return 'Return';
        }
    }
}
