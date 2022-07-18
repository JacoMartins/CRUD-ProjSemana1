<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'updated_at',
        'who_posted'
    ];

    protected $casts = [
        'id'=> 'integer',
        'created_at'=> 'datetime',
        'who_posted' => 'string',
    ];
}
