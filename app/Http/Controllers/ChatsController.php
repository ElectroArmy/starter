<?php

namespace App\Http\Controllers;

use App\Events\MessagePosted;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{

    public function index()
    {
        return view('chats.index');

    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMessages()
    {

        return Message::with('user')->get();

    }

    /**
     * @return array
     */
    public function postMessages()
    {
        // Store the new message
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => request()->get('message')
        ]);

        //dd($message);

        // Announce that a new message has been posted
        //event(new MessagePosted($message, $user));
        //return "event fired";
        //broadcast(event(new MessagePosted($message, $user)))->toOthers();

        return ['status' => 'OK'];

    }

}
