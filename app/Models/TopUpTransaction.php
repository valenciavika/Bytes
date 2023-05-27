<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TopUpTransaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function TopUp()
    {
        return $this->belongsTo(TopUp::class);
    }
    public function TopUpPaymentMethod()
    {
        return $this->belongsTo(TopUpPaymentMethod::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
