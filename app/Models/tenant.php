<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\tenant_category;
use app\Models\menu;

class tenant extends Model
{
    use HasFactory;
    public function tenant_category()
    {
        return $this->belongsTo(tenant_category::class);
    }

    public function menu()
    {
        return $this->hasMany(menu::class);
    }
}
