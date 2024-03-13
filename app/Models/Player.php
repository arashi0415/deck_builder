<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\PlayerController;

class Player extends Model
{

    public static function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'introduction' => 'nullable', 'string', 'max:1000',
            'icon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'favorite_card' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tag' => 'nullable|string|max:255|regex:/^[^,]+\,?(?<!,)$/',
            // ... other rules
        ];
        
    }


    protected $fillable = [
        'name',
        'email',
        'introduction',
        'icon',
        'favorite_card',
        'tag',
        'registered',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $casts = [
        'registered' => 'boolean',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->registered = true;
    }




    

}
