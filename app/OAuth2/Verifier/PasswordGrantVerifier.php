<?php

namespace App\OAuth2\Verifier;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        if (Auth::once([
            'email'    => $username,
            'password' => $password,
        ])) {
            return Auth::user()->id;
        }
        return false;
    }
}