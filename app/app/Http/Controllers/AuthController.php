<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function login(): Factory|View|Application
    {
        return view('authentication/login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function logout(Request $request): Redirector|RedirectResponse|Application
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
