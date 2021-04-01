<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $testCentre = TestCentre::latest()->paginate(5);

        return view('manager/handleManager', compact('testCentre'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
