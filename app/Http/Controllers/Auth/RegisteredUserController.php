<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nik' => ['required', 'numeric'],
            'no_hp' => ['required', 'numeric'],
            'addres' => ['required', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $user->assignRole('user');

        $userDetails = new UserDetails();
        $userDetails->user_id = $user->id;
        $userDetails->nik = $request->nik;
        $userDetails->no_hp = $request->no_hp;
        $userDetails->address = $request->address;
        // $userDetails->ktp_photo = 'default.jpg';
        if ($request->file('ktp_photo')) {
            $request->file('ktp_photo')->move('assets/upload/ktp_photo', $date.$random.$request->file('ktp_photo')->getClientOriginalName());
            $userDetails->ktp_photo = $date.$random.$request->file('ktp_photo')->getClientOriginalName();
        } else {
            $userDetails->ktp_photo = "default.png";
        }
        $userDetails->save();

        Auth::login($user);



        return redirect(RouteServiceProvider::HOME);
    }
}
