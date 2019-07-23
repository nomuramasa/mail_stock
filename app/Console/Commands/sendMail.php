<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail; // メールファサード
use App\Message; // メッセージモデル
use App\User; // ユーザモデル

class sendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'タスクメッセージをメールアドレスへ送信';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
        foreach($users as $user){ // ユーザーの数だけforeachで回す
            $message = Message::where('user_id', $user->id)->first(); // idが最小のものを送る

            // メール送信
            Mail::raw(
                $message->content, // 内容

                function($m) use ($user) { 
                    $m->to($user->email); // 宛先
                    $m->subject('ひらめきメモ'); // タイトル
                }
            );

            // 履歴に保存
            $history = new History();

            $history->content = $message->content; // 今送ったメッセージを保存
            $history->user_id = $user->id; // ログイン中ユーザーのID
            $history->save();

        }

    }
}
