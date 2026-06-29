<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'invoice', 'total_amount', 'status',
        'customer_name', 'customer_email', 'customer_phone', 'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'pending' => 'badge-warning',
            'paid'    => 'badge-success',
            'expired' => 'badge-danger',
            'failed'  => 'badge-danger',
            default   => 'badge-secondary',
        };
    }

    public function getTotalFormattedAttribute(): string
    {
        return 'Rp' . number_format($this->total_amount, 0, ',', '.');
    }
}
