<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'email',
    'address',
    'payment_type',
    'total'
];

public function items()
{
    return $this->hasMany(OrderItem::class);
}

}
