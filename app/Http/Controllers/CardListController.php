<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Card_list;
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
        // ビューに渡す
        return view('card-list', compact('cards'));
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
        // dd($request);
        
        $validatedData = $request->validate(card_list::validationRules());
        
        // $card_name = $validatedData['card_name'];
        // $card_number = $validatedData['number'];
        // $my_card = $validatedData['my_card'];
        
        $dir_cards = 'cards';



        for ($i = 0; $i < count($validatedData['card_name']); $i++) {
            // 画像ファイル名の取得と保存
            $my_cardFileName = $validatedData['my_card'][$i]->getClientOriginalName();
            $validatedData['my_card'][$i]->storeAs('public/' . $dir_cards, $my_cardFileName);
        
            // データベースへのインサート
            $card_list = new card_list([
                'card_name' => $validatedData['card_name'][$i],
                'number' => $validatedData['number'][$i],
                'my_card' => $my_cardFileName,
                'user_id' => Auth::id(),
            ]);
            $card_list->save();
            return redirect()->route('card_list.index');
        }

        // Player モデルの作成と保存

        
        
        // $card_list = new card_list([
        //     'my_card' => $my_cardFileName,
        //     'user_id' => Auth::id(),

        // ] + $request->all()); // その他のフォームデータをすべて追加
    
        // $card_list->save();

        // return redirect()->route('card_register', $my_card->id);
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
