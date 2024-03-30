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
            'card_name' => 'required|array',
            'card_name.*' => 'required|string|max:255',
            'number' => 'required|array',
            'number.*' => 'required|string|max:255',
            'my_card' => 'required|array',
            'my_card.*' => 'file|mimes:jpg,jpeg,png|',
            // ... other rules
        ];        
    }

    protected $fillable = [
        'user_id',
        'card_name',
        'my_card',
        'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

