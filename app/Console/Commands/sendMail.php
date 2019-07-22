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
            $message = Message::where('user_id', $user->id)->first(); // idが最小のもの

            // メール送信
            Mail::raw($message->content, function($m) {
                $m->to($user->email) // 宛先
                ->subject('ひらめきメモ'); // タイトル
            });
        }

    }
}
