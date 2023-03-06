<?php

namespace App\Models;

use App\Http\Controllers\ingredientController;
use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'price',
        'price_k',
        'user_id'
    ];

    public function supermarket() {
        return $this->belongsToMany(Supermarket::class);
        }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relaciones muchos a muchos

}
