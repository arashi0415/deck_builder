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

        // ユーザーに紐づくカードを取得
        $cards = card_list::where('user_id', $userId)->get();

        // 画像のURLを生成
        foreach ($cards as $card) {
            $card->image_url = Storage::url($card->my_cards);
        }
        // ビューに渡す
        return view('card-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register-card');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dir_my_Card = 'my_Card';

        // ファイル処理
        $cardsFileName = $request->file('cards')->getClientOriginalName();
        $request->file('cards')->storeAs('public/' . $dir_my_Card, $cardsFileName);


        // Player モデルの作成と保存
        $my_card = new myCard([
            'my_Card' => $cardsFileName,
            'user_id' => Auth::id(),
        ] + $request->all()); // その他のフォームデータをすべて追加

        $my_card->save();

        return redirect()->route('player.index', $my_card->id);
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
        $validatedData = $request->validate($card_list->rules());

        // データを更新
        $card_list->update($validatedData);

        // 一覧画面にリダイレクト
        return redirect()->route('card_list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(card_list $card_list)
    {
        //
    }
}
