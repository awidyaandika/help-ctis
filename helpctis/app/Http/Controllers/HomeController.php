<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (auth()->user()->position == 'manager') {
            return redirect()->route('manager.route');
        }else if(auth()->user()->position == 'officer'){
            return redirect()->route('officer.route');
        }else{
            return redirect()->route('home');
        }
    }

    public function handleOfficer()
    {
        return view('officer/handleOfficer');
    }

    public function handleManager()
    {
        return view('manager/handleManager');
    }
}
