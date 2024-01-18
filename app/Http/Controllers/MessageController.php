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
        $acceptedFriends = $authUser->acceptedFriends();
        return view('messages.index', compact('pending', 'acceptedFriends'));
    }

    public function noParameter() {
        $user = User::find(4);
        return redirect()->route('messages', $user->id);
    }

    public function store(Request $req) {
    }

    public function destroy() {
    }
}
