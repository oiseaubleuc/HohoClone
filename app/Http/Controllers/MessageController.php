<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages()
    {
        $messages = [
            ['sender' => 'User 1', 'content' => 'Hello, how are you?', 'time' => '2 minutes ago'],
            ['sender' => 'User 2', 'content' => 'Are we still meeting tomorrow?', 'time' => '1 hour ago'],
        ];

        return view('messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'subject' => 'required|max:255',
            'content' => 'required',
        ]);

        $receiver = User::where('username', $request->username)->first();

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id,
            'subject' => $request->subject,
            'content' => $request->Content,
        ]);

        return redirect()->route('messages')->with('success', 'Message sent successfully.');
    }
}
