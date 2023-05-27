<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpPaymentMethod extends Model
{
    use HasFactory;
    public function TopUpTransaction()
    {
        return $this->hasMany(TopUpTransaction::class);
    }
}
