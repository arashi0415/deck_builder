<?php

namespace App\Http\Controllers;

use App\Models\card_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CardListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // ユーザーIDを取得
        $userId = $request->user()->id;

        // DBからカード情報を取得
        $cards = DB::table('cards')
            ->where('user_id', $userId)
            ->get();

        // 画像のURLを生成
        foreach ($cards as $card) {
            $card->image_url = Storage::url('cards/' . $card->my_cards);
        }

        // カードリストを表示
        return view('card_list', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(card_list $card_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(card_list $card_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, card_list $card_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(card_list $card_list)
    {
        //
    }
}
