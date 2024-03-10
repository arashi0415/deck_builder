<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [
        "user_id"
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'introduction' => 'nullable', 'string', 'max:1000',
        'icon' => 'required', 'image', 'max:1024', 'unique:players',
        'Favorite_card' => 'required', 'image', 'max:1024', 'unique:players',
        'tag' => 'nullable', 'string', 'max:255', 'regex:/^[^,]+\,?(?<!,)$/'
      ];



    

}
