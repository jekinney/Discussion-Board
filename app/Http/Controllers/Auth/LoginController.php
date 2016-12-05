<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            if(auth()->user()->activated) {
                return redirect('/');
            }
            auth()->logout();
            return back()->withErrors('email', 'Sorry, the account is not activated');
        }
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
