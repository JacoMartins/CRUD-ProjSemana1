<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $casts = [
        'uuid' => 'string',
        'username' => 'string',
    ];
}
