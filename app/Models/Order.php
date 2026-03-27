<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'city',
        'email',
        'type',
        'status',
        'amount',
        'confirmation_token',
    ];

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            if (empty($order->confirmation_token)) {
                $order->confirmation_token = Str::random(64);
            }
        });
    }

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:3',
        ];
    }
}
