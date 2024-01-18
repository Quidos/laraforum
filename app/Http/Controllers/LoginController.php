<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function store(Request $req) {
        $req->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        if(!Auth::attempt($req->only(['name', 'password']))) return back()->withErrors(['name' => 'Incorrect credentials']);
        return redirect()->route('categories');
    }

    public function destroy() {
        Auth::logout();
        return redirect('login');
    }
}
