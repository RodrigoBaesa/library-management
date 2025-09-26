<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name'=> ['required', 'min: 3', 'max: 100'], 
            'email'=> ['required', 'email', 'max: 100', Rule::unique('users', 'email')],
            'password'=>'required'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::Create($incomingFields);

        auth()->login($user);

        return redirect('/');
    }
}
