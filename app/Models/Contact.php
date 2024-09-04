<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        
        'name',
        'email',
        'phone',
        'message',
    ];
}
