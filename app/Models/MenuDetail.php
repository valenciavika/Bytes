<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant;

class MenuDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

}