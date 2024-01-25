<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [  'user_id', 'vendor_id', 'username', 'vendor_name', 'address', 'dish_id', 
    'dish_name', 'dish_qty', 'dish_price', 'dish_image', 'payment_method', 'subtotal','day','service_fee','delivery_fee','cancel_time','order_status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isCancellationTimePassed()
    {
        return now()->greaterThanOrEqualTo($this->cancel_time);
    }
    
    // const YOUR_CONSTANT_VALUE = 'cancelled';

}
