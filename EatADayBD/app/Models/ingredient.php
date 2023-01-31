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
        'price_k'
    ];

    //relaciones muchos a muchos
    public function recipe() {
        return $this->belongsToMany(Recipe::class);
    }
}
