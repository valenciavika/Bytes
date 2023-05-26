<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant;

class Tenant_category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tenant(){
        return $this->hasMany(Tenant::class);
    }
};


