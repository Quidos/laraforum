<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index(Category $category) {
        $threads = $category->threads()->paginate(20);
        return view('threads.index', compact('threads', 'category'));
    }

    public function show(Thread $thread) {
        $posts = $thread->posts()->with('user')->get();
        return view('threads.show', compact('thread', 'posts'));
    }

    public function create(Category $category, Request $req) {
        return view('threads.create', compact('category'));
    }

    public function store(Category $category, Request $req) {
        $req->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $thread = Auth::user()->threads()->create([
            'title' => $req->title,
            'category_id' => $category->id
        ]);

        $thread->posts()->create([
            'content' => $req->content,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('threads.show', ['thread' => $thread->id]);

    }
}
