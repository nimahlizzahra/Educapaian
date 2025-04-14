<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Tentukan redirect setelah login
     *
     * @return string
     */
    protected function redirectTo()
        {
            return '/dashboard';
        }

    

    /**
     * Buat instance baru untuk LoginController
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
