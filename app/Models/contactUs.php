<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    //

    protected $table = 'contact_us'; // Table name

    protected $fillable = [
        'name',
        'email',
        'message',
        'created_at',
        'updated_at',
    ];
}
