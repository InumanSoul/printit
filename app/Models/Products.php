<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'image',
        'name',
        'description',
        'price',
        'barcode',
        'cost',
        'stock',
        'is_composite',
        'inventory',
        'inventory_enabled',
        'category_id',
        'company_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}