<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address'
    ];

    protected $with = [
        'menuItems'
    ];

    public function menuItems()
    {
        return $this->hasMany(
            MenuItem::class,
            'restaurant_id',
            'id'
        );
    }
}
