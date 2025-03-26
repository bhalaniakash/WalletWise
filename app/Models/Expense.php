<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses'; // Table name
    protected $fillable = [
        'user_id',
        'category_id',
        'expense_name', // Ensure this matches your database column
        'amount',
        'date',
        'payment_method',
        'description',

    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
