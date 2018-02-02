<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Guard $auth, Request $request)
    {
        // get some credentials
        $credentials = $request->only(['email', 'password']);

        if ($auth->attempt($credentials)) {
            return $token = $auth->issue();
        }

        return ['Invalid Credentials'];
    }
}
