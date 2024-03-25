<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    $validatedData = $request->validate(Player::validationRules());
    $dir_icons = 'icons';
    $dir_favoriteCards = 'favoriteCards';

    // ファイル処理
    $icon = $validatedData['icon'];
    $iconFileName = $icon->getClientOriginalName();
    $icon->storeAs('public/' . $dir_icons, $iconFileName);

    $favoriteCard = $validatedData['favorite_card'];
    $favoriteCardFileName = $favoriteCard->getClientOriginalName();
    $favoriteCard->storeAs('public/' . $dir_favoriteCards, $favoriteCardFileName);
    

    // $favoriteCardFileName = $validatedData['favorite_card']->getClientOriginalName();
    // $validatedData['favorite_card']->file('favorite_card')->storeAs('public/' . $dir_favoriteCards, $favoriteCardFileName);

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
        $userId = Auth::id();

        if ($player->id !== $userId) {
            abort(403); // 権限エラー
        }


        $validatedData = $request->validate($player->rules());

        $dir_icons = 'icons';
        $dir_favoriteCards = 'favoriteCards';

        if ($request->hasFile('icon')) {
            $icon = $validatedData['icon'];
            $iconFileName = $icon->getClientOriginalName();
            $icon->storeAs('public/' . $dir_icons, $iconFileName);
    
            // 画像の名前を更新
            $player->icon = $iconFileName;
        }
        if ($request->hasFile('icon')) {
            $favoriteCard = $validatedData['favorite_card'];
            $favoriteCardFileName = $favoriteCard->getClientOriginalName();
            $favoriteCard->storeAs('public/' . $dir_favoriteCards, $favoriteCardFileName);
    
            // 画像の名前を更新
            $player->icon = $favoriteCardFileName;
        }

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
