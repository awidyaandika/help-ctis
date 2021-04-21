<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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
        $tc = Auth::user()->centre_name;
        $ct = Auth::user()->name;

        $test_kit = DB::table('test_kits')->join('test_centres', 'test_kits.centre_id', '=', 'test_centres.id')
            ->where('test_centres.centre_name', $tc)
            ->count();

        $centre_officer = DB::table('users')->join('test_centres', 'users.centre_name', '=', 'test_centres.centre_name')
            ->where( 'users.position', 'officer')
            ->where('test_centres.centre_name', $tc)
            ->count();

        $tester = DB::table('users')->join('test_centres', 'users.centre_name', '=', 'test_centres.centre_name')
            ->where( 'users.position', 'tester')
            ->where('test_centres.centre_name', $tc)
            ->count();

        $patient = DB::table('users')->join('test_centres', 'users.centre_name', '=', 'test_centres.centre_name')
            ->where( 'users.position', 'patient')
            ->where('test_centres.centre_name', $tc)
            ->count();

        $covid_test = DB::table('covid_tests')->join('users', 'covid_tests.patient_name', '=', 'users.name')
            ->where( 'covid_tests.officer_name', $ct)
            ->count();

        $covid_test_patient = DB::table('covid_tests')->join('users', 'covid_tests.patient_name', '=', 'users.name')
            ->where( 'covid_tests.patient_name', $ct)
            ->count();

        $name = Auth::user()->name;
        $testcentre = DB::table('test_centres')->join('users', 'test_centres.centre_name', '=', 'users.centre_name')
            ->where('users.name', $name)
            ->count();

        if (auth()->user()->position == 'manager')
        {
            if($testcentre < 1)
            {
                return view('test-centre.create');
            }
            else
            {
                return view('manager.managerhome', compact('test_centre', 'test_kit', 'centre_officer', 'tester', 'covid_test', 'patient'));
            }
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
            return view('patient.patienthome', compact('test_centre', 'test_kit', 'centre_officer', 'tester', 'covid_test', 'patient', 'covid_test_patient'));
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
