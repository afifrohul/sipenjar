<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roleUser = \Auth::user()->roles->pluck('name')[0];
        if ($roleUser == 'admin') {
            return redirect('/back-admin/back-dashboard');
        } elseif ($roleUser == 'user') {
            return redirect('/back-user/back-dashboard');
        } else {
            return redirect('/back-logout');
        }
    }
}
