<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = ['address1', 'address2', 'state', 'zipcode', 'city', 'country_code', 'type', 'user_id', 'isMain'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
