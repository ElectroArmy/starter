<?php

namespace App\Http\Controllers;

use App\Events\MessagePosted;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{


    /**
     * Display all the chat messages within an index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('chats.index');

    }


    /**
     * Return all the messages output by a user with a get request.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMessages()
    {

        return Message::with('user')->get();

    }

    /**
     * Grab the newly created message from the request object and store that message
     *
     *
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
