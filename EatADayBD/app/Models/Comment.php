<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'isFrequent'
    ];
    protected $hidden = [
        'isFrequent',
        'created_at',
        'updated_at'
    ];
}