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
        $test_centre = DB::table('test_centres')->get();
        $test_kit = DB::table('test_kits')->count();
        $centre_officer = DB::table('users')->where('position', 'officer')->count();
        $tester = DB::table('users')->where('position', 'tester')->count();
        $patient = DB::table('users')->where('position', 'patient')->count();
        $covid_test = DB::table('covid_tests')->count();

        if (auth()->user()->position == 'manager')
        {
            return view('manager.managerhome', compact('test_centre', 'test_kit', 'centre_officer', 'tester', 'covid_test', 'patient'));
        }
        else if(auth()->user()->position == 'officer')
        {
            return view('officer.officerhome', compact('test_centre', 'test_kit', 'centre_officer', 'tester', 'covid_test', 'patient'));
        }
        else if(auth()->user()->position == 'tester')
        {
            return view('tester.testerhome', compact('test_centre', 'test_kit', 'centre_officer', 'tester', 'covid_test', 'patient'));
        }
        else if(auth()->user()->position == 'patient')
        {
            return view('patient.patienthome', compact('test_centre', 'test_kit', 'centre_officer', 'tester', 'covid_test', 'patient'));
        }
        else
        {
            return view('home', compact('test_centre'));
        }
    }

    public function handleOfficer()
    {
        return view('officer.officerhome');
    }

    public function handleManager()
    {
        return view('manager.managerhome');
    }

    public function handleTester()
    {
        return view('tester.testerhome');
    }

    public function handlePatient()
    {
        return view('patient.patienthome');
    }
}
