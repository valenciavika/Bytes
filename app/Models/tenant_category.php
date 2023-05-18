<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\tenant;

class tenant_category extends Model
{
    use HasFactory;

    public function tenant(){
        return $this->hasMany(tenant::class);
    }
};


