<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'total_price', 'session_id', 'created_by', 'user_address_id', 'updated_by'];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
