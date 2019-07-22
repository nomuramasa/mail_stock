<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('message.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partner.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'partner_name' => 'string|max:255',
            'campaign_code' => 'max:255|unique:partners',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // ユーザー
        $user = new User(); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // 代理店
        $partner = new Partner(); 
        $partner->name = $request->partner_name;
        $partner->campaign_code = $request->campaign_code;
        $partner->user_id = $user->id;
        $partner->save();

        return redirect()->route('partner.list');
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
    public function edit(Message $message)
    {
        $partner = Partner::find($id);
        return view('partner.edit', ['partner' => $partner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        // バリデーション
        $validateData = $request->validate([
            'name' => 'string|max:255',
            'campaign_code' => 'max:255',
        ]);

        // 代理店
        $partner = Partner::find($id); 
        $partner->name = $request->name;
        $partner->campaign_code = $request->campaign_code;
        $partner->save();

        return redirect()->route('partner.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
