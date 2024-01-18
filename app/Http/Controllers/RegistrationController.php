<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }
    public function index() {
        return view('registration.index');
    }

    public function store(Request $req) {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password
        ]);
        return redirect()->route('login');
    }
}
