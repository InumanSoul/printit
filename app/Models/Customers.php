<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name', 
        'email',
        'phone',
        'address',
        'document',
        'user_id',
        'company_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function companies()
    {
        return $this->belongsTo(Companies::class, 'id', 'company_id');
    }
}
