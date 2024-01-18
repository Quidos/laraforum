<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
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

    public function delete(Thread $thread, Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('threads.show', $thread->id);
    }
}
