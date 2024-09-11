<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'description',
        'amount',
        'document_path',
        'expense_date',
        'company_id',
        'contact_id',
        'category_id',
        'user_id',
        'updated_at',
    ];

    protected $appends = ['contact_name', 'category_name'];

    public function getContactNameAttribute()
    {
        return $this->contact->name;
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function contact()
    {
        return $this->belongsTo(Contacts::class);
    }

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

    public function tax()
    {
        return $this->belongsToMany(Taxes::class, 'expense_tax');
    }
}
