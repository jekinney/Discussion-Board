<?php

namespace App\Http\Controllers\Auth;

use App\Users\Models\User;
use App\Users\Models\Social;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Register;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create(Social $social)
    {
        return view('auth.register', compact('socail'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function store(Register $request, User $user)
    {
        $user = $user->register($request);

        return redirect()->route('profile.edit', $user->uid);
    }
}
