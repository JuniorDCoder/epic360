<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total', 'status'];
    public $incrementing = false; // Disable auto-incrementing

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = '#' . strtoupper(Str::random(6)); // Generate custom order ID
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
