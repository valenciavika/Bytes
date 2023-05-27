<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;
    public function TopUp()
    {
        return $this->belongsTo(TopUp::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    } 
}
