<?php


namespace App\Http\Controllers;


use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegistrationController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function registerUser(): Application|Factory|View
    {
        return view('authentication.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function storeUser(RegisterRequest $request): RedirectResponse
    {
        $request = $request->only(['name', 'email', 'password']);
        $request['password'] = Hash::make($request['password']);

        $user = new User($request);
        $user->save();
        auth()->login($user);

        return redirect()->to('/');
    }
}
