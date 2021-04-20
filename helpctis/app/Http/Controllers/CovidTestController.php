<?php

namespace App\Http\Controllers;

use App\Models\CovidTest;
use App\Models\TestCentre;
use App\Models\TestKit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CovidTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covidtest = DB::table('users')->where('position', 'patient')->paginate(5);

        $data = DB::table('covid_tests')
            ->join('users', 'users.name', '=', 'covid_tests.officer_name')
            ->join('test_kits', 'test_kits.test_name', '=', 'covid_tests.test_name')
            ->join('test_centres', 'test_centres.centre_name', '=', 'users.centre_name')
            ->select(['covid_tests.*', 'users.name', 'test_kits.test_name', 'test_centres.centre_name'])->get();

        return view('covid-test.index', compact('covidtest', 'data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('users')->where('position', 'patient')->paginate(5);
        $testcentres = TestCentre::all();
        $data = DB::table('test_kits')->join('test_centres', 'test_kits.centre_id', '=', 'test_centres.id')
            ->select(['test_kits.*', 'test_centres.*'])->get();

        return view('covid-test.create', compact('user', 'testcentres', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'officer_name' => 'required',
            'patient_name' => 'required',
            'test_date' => 'required',
            'test_name' => 'required',
            'symptomps' => 'required',
            'result_date' => 'required',
            'status' => 'required',
            'result' => 'required',
        ]);

        TestKit::where('test_name', $request->test_name)->decrement('stock', 1);

        CovidTest::create($request->all());

        return redirect()->route('covid-test.index')
            ->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CovidTest  $covidTest
     * @return \Illuminate\Http\Response
     */
    public function show(CovidTest $covidTest)
    {
        return view('covid-test.show',compact('covidTest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CovidTest  $covidTest
     * @return \Illuminate\Http\Response
     */
    public function edit(CovidTest $covidTest)
    {
        $user = DB::table('users')->where('position', 'patient')->paginate(5);
        $testcentres = TestCentre::all();

        return view('covid-test.edit', compact('user', 'testcentres', 'covidTest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CovidTest  $covidTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CovidTest $covidTest)
    {
        $request->validate([
            'test_date' => 'required',
            'symptomps' => 'required',
            'result_date' => 'required',
            'status' => 'required',
            'result' => 'required',
        ]);

        $covidTest->update($request->all());

        return redirect()->route('covid-test.index')
            ->with('success','Data created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CovidTest  $covidTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CovidTest $covidTest)
    {
        $covidTest->delete();

        return redirect()->route('covid-test.index')
            ->with('success', 'Data has been deleted successfully');
    }
}
