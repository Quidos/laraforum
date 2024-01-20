<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function index() {
    }

    public function store(User $user, Request $req) {
        $authUser = Auth::user();
        if($authUser->friendExists($user)) abort(403);

        $authUser->friendsTo()->attach($user);
        return redirect()->back();
    }

    public function accept(User $user) {
        if(!Auth::user()->pendingFriendsFromExists($user)) abort(403);
        Auth::user()->pendingfriendsFrom()->updateExistingPivot($user, ['accepted' => 1]);
        return redirect()->back();
    }

    public function decline(User $user) {
        if(!Auth::user()->pendingFriendsFromExists($user)) abort(403);
        Auth::user()->pendingfriendsFrom()->detach($user);
        return redirect()->back();
    }

    public function cancel(User $user)
    {
        Auth::user()->pendingFriendsTo()->detach($user);
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $authUser = Auth::user();
        $authUser->friendsTo()->detach($user);
        $authUser->friendsFrom()->detach($user);

        return redirect()->back();
    }
}
