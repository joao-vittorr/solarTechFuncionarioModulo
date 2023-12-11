<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('sub', $user->getId())->first();

        if ($existingUser) {
            if ($existingUser->name !== $user->getName() || $existingUser->email !== $user->getEmail()) {
                $existingUser->name = $user->getName();
                $existingUser->email = $user->getEmail();
                $existingUser->save();
            }
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->sub = $user->getId();
            $newUser->access_level = 'cliente';

            $newUser->save();

            Auth::login($newUser);
        }

        if (Auth::user()->access_level === 'cliente') {
            return redirect('/');
        } elseif (Auth::user()->access_level === 'admin' || Auth::user()->access_level === 'funcionario') {
            return redirect('/dashboard');
        }

        
    }
}

