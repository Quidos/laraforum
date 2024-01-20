<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::with(['threads.posts'])->get();
        //dd($categories);
        $noUsers = User::count();
        $latestThreads = Thread::latest()->take(5)->get();
        return view('categories.index', compact('categories', 'noUsers', 'latestThreads'));
    }

    public function store(Request $req) {

    }
}
