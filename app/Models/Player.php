<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PlayerController;

class Player extends Model
{
    protected $guarded = [
        "user_id",
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'introduction' => 'nullable', 'string', 'max:1000',
        'icon' => 'required|image|max:1024',
        'favorite_card' => 'required|image|max:1024',
        'tag' => 'nullable', 'string', 'max:255', 'regex:/^[^,]+\,?(?<!,)$/'
    ];

    protected $fillable = [
        'name',
        'email',
        'introduction',
        'icon',
        'favorite_card',
        'tag',
        "registered"
    ];


    protected $casts = [
        'registered' => 'boolean',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->registered = true;
    }




    

}
