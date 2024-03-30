<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Card_list;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // リクエストから検索クエリを取得
        $query = $request->input('query');

        // データベースから card_name が検索クエリと一致するデータを検索
        $cards = [];

        if ($query) {
            $cards = Card_list::where('card_name', 'like', "%{$query}%")->get();
        }

        // ビューにカード情報を渡して表示
        return view('search', [
            'cards' => $cards,
        ]);
    }
}
