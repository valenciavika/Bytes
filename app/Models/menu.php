<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Tenant;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
    
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
