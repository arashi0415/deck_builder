<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CardListController;
use App\Models\CardList;

class card_list extends Model
{
    public function index()
    {
        // 全てのカードを取得
        $cards = card_list::all();

        // ビューに渡す
        return view('card_list', ['cards' => $cards]);
    }
}
