<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_count',
        'item_id'
    ];

    public function order()
    {
        return $this->belongsTo(
            Order::class,
            'order_id',
            'id',
            'order'
        );
    }

    public function item()
    {
        return $this->belongsTo(
            MenuItem::class,
            'item_id',
            'id',
            'item'
        );
    }
}
