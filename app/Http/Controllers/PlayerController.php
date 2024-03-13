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

        $boolean = isset($player) && $player->registered;

        if (empty($boolean)) {
            // 新規登録画面にリダイレクト
            return view('newplayer');
        }

        if ($boolean === true) {
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


    

    // ファイル処理
    $iconFileName = uniqid() . '.' . $request->file('icon')->getClientOriginalExtension();
    $request->file('icon')->storeAs('public/icons', $iconFileName);

    $favoriteCardFileName = uniqid() . '.' . $request->file('favorite_card')->getClientOriginalExtension();
    $request->file('favorite_card')->storeAs('public/favoriteCards', $favoriteCardFileName);

    // Player モデルの作成と保存
    $player = new Player([
        'icon' => $iconFileName,
        'favorite_card' => $favoriteCardFileName,
        'user_id' => Auth::id(),
    ] + $request->all()); // その他のフォームデータをすべて追加

    $player->save();

    return redirect()->route('player.index', $player->id);
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
