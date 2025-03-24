<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Budget extends Model
{
    use HasFactory;

    protected $table = 'budget'; 

    protected $fillable = [
        // 'name',
        'limit',
        'saving',
        'user_id', 
    ];

    /**
     * Relationship: Budget belongs to a User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
