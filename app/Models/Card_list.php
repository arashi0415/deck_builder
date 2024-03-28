<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CardListController;

class card_list extends Model
{
    public static function validationRules()
    {
        return [
            'card_name' => 'required|string|max:255',
            'my_card' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable', 'string', 'max:1000',
            'number' => 'nullable', 'string', 'max:1000',
            // ... other rules
        ];        
    }

    protected $fillable = [
        'user_id',
        'card_name',
        'my_card',
        'title',
        'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

