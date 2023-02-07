<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'price',
        'price_k',
        'user_id'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
