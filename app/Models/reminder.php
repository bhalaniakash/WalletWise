<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reminder_name',
        'reminder_amount',
        'due_date',
        'frequency',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
