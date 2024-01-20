<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(User $user) {
        $authUser = Auth::user();
        $pending = $authUser->pendingFriendsFrom;
        $acceptedFriends = $authUser->acceptedFriends;
        $messages = $authUser->messagesWith($user);
        //dd($messages);
        $chatUser = $user;
        return view('messages.index', compact('pending', 'acceptedFriends', 'chatUser', 'messages'));
    }

    public function store(User $user, Request $req) {
        $authUser = Auth::user();

        $req->validate([
            'content' => 'required'
        ]);

        if(!$authUser->acceptedFriendExists($user)) abort(403);

        Auth::user()->sentMessages()->create([
            'content' => $req->content,
            'receiver_id' => $user->id
        ]);
        return redirect()->back();
    }

    public function destroy() {
    }
}
