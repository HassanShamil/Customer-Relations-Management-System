<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required','min:3', Rule::unique('users','name')],
            'email' => ['required', 'email',Rule::unique('users','email')], 
            'password' => ['required', 'min:4'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        logger('Validation passed:', $incomingFields);

        unset($incomingFields['confirm_password']);  
        $incomingFields['password'] = bcrypt($incomingFields['password']); // hashing password 
        $user = User::create($incomingFields);

        if (!$user) {
            logger('User creation failed');
            return 'User creation failed';
        }

        Mail::to($user->email)->send(new WelcomeEmail($user));


        auth() -> login($user);
        
        return redirect('/dashboard');
    }

    public function login(Request $request) {
        $incomingFields = $request-> validate([ 
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);


    
        // return redirect('/');
        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password'=> $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors(['loginname' => 'Invalid credentials']);
    }

    public function logout() {
        auth()-> logout();
        return redirect('/');
    }
}
