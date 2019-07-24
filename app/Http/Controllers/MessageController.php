<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  // クエリビルダを使う

class MessageController extends Controller
{
    // ログインしてない場合のアクセス制限
    public function __construct()
    {
        $this->middleware('auth'); // ログインしてなければ弾く
        // ->except(['index', 'show']);  // 除外するページ
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        // クエリビルダ
        $messages = DB::table('messages')
            ->where(function($query)
            {
                // メール未送信（ステータスがdone以外）のメッセージのみを表示
                $query->where('status', '=', 'set')
                      ->orWhere('status', '=', 'off');
            })
            ->where('user_id', '=', $user->id)
            ->get();

        return view('message.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 新規追加
        $message = new Message();

        $user = \Auth::user();

        $message->content = $request->content;
        $message->user_id = $user->id;
        $message->status = 'set';
        $message->save();

        return redirect()->route('message.list'); // リストに戻る
    }


    // メールボタンを押したとき
    public function switch(Message $message, $id)
    {
        $message = Message::find($id); 

        // セット・オフを切り替え
        if($message->status == 'off'){ // オフなら
            $message->status = 'set'; // セットに
        }else{ // セットなら
            $message->status = 'off'; // オフに
        }
            $message->save(); //保存

        return redirect()->route('message.list'); // リストに戻る
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message, $id)
    {
        $message = Message::find($id);
        return view('message.edit', ['message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message, $id)
    {
        $message = Message::find($id);
        $message->content = $request->content;
        $message->save();
        return redirect()->route('message.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message, $id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect('/messages');
    }
}
