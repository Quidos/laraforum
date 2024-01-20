<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
    }

    public function show(User $user, Request $req) {
        $threads = $user->threads()->paginate(5);
        return view('user.show', compact('user', 'threads'));
    }

    public function store(Thread $thread, Request $req) {
        $req->validate([
            'content' => 'required'
        ]);

        $thread->posts()->create([
            'content' => $req->content,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('threads.show', $thread->id);
    }
}
