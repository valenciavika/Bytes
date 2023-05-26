<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant_category;
use App\Models\Menu;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function tenant_category()
    {
        return $this->belongsTo(Tenant_category::class);
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }


    public function scopeFilter($query, array $filter) {

        $query->when($filter['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhereHas('menu', function($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                         });    
        });

        $query->when($filter['category'] ?? false, function($query, $category) {
            return $query->where('tenant_category_id', 'like', $category);
        });
    }
}
