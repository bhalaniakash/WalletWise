<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class incomeController extends Model
{
    use HasFactory;

    protected $table = 'income_controllers'; // Table name

    protected $fillable = [
        'user_id',
        'category_id',
        'source',
        'amount',
        'date',
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
