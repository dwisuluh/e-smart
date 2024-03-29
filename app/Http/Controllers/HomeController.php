<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $isSuperadmin = Gate::allows('superadmin');

        // dump($isSuperadmin); // Dump hasil evaluasi gate

        // $this->authorize('superadmin');
        // if (Auth::check()) {
        //     if (Gate::allows("superadmin")) {
        //         // Lakukan aksi untuk superadmin
        //     } else {
        //         // Lakukan aksi untuk pengguna lain
        //     }
        // }
        return view('home');

    }
}
