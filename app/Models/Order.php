<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'delivered_at',
        'notes',
        'amount'
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id',
            'user'
        );
    }

    public function items()
    {
        return $this->hasMany(
            OrderItem::class,
            'order_id',
            'id'
        );
    }
}
