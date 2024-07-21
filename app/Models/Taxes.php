<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    use HasFactory;

    protected $table = 'taxes';

    protected $fillable = [
        'name',
        'rate',
        'is_shared',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function product()
    {
        return $this->belongsToMany(Products::class, 'product_tax');
    }

    public function expense()
    {
        return $this->belongsToMany(Expenses::class, 'expense_tax');
    }
}
