<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $playerId = Auth::id();
        $player = Player::where('user_id', $playerId)->first();

        $boolean = $request->input('boolean');
        if (empty($boolean)) {
            // 新規登録画面にリダイレクト
            return view('newplayer');
        }

        if ($boolean === 1) {
            // player.blade.php にリダイレクト
            return view('player', compact('player'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = (new Player)->rules;
        $rules['mis_match'] = 'required';

    // バリデーションメッセージ
    $messages = [
        'mis_match' => '入力に合っていない項目があります',
    ];

    // バリデーションエラー時の処理
    $customHandler = function ($errors) {
        return redirect()->back()->withInput()->withErrors($errors);
    };

    
    // リクエストデータのバリデーション
    $validatedData = $request->validate($rules, $messages, $customHandler);
    
    $iconFileName = uniqid() . '.' . $request->file('icon')->getClientOriginalExtension();
    $request->file('icon')->storeAs('storage/app/public/icons', $iconFileName);

    // favorite_card の処理
    $favoriteCardFileName = uniqid() . '.' . $request->file('favorite_card')->getClientOriginalExtension();
    $request->file('favorite_card')->storeAs('storage/app/public/favoriteCards', $favoriteCardFileName);

    // Player モデルへの保存
    $player = new Player();
    $player->fill($validatedData);
    $player->icon = $iconFileName;
    $player->favorite_card = $favoriteCardFileName;
    $player->save();

    return redirect()->route('players.index', $player->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $validatedData = $request->validate($player->rules());

    // データを更新
    $player->update($validatedData);

    // 一覧画面にリダイレクト
    return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
