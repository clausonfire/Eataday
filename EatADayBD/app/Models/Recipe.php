<?php

namespace App\Models;

use App\Http\Controllers\ingredientController;
use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'photo',
        'ingredients',
        'displayIngredients',
        'preparation',
        'description',
        'isChecked'
        // title' => 'required|string',
        //         'photo' => 'nullable|string',
        //         'ingredients' => 'required|string',
        //         'displayIngredients' => 'required|string',
        //         'preparation' => 'required|string',
        //         'description' => 'required|string',
        //         'isChecked' =>'boolean
    ];
    protected $casts = [
        'ingredients' => 'array',
        'displayIngredients'=>'array',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //relaciones muchos a muchos
    

    public function user()
    {
        return $this->belongsToMany(User::class);
    }


}
