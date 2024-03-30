<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card_list extends Model
{
    use HasFactory;

    protected $table = 'card_lists';

    public static function searchByKeyword($keyword)
    {
        return self::where('card_name', 'like', '%' . $keyword . '%')
            ->orWhere('number', 'like', '%' . $keyword . '%')
            ->get();
    }
}
