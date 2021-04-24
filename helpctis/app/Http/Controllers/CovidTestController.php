<?php

namespace App\Http\Controllers;

use App\Models\CovidTest;
use App\Models\TestCentre;
use App\Models\TestKit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CovidTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('covid_tests')
            ->join('users', 'covid_tests.officer_name', '=', 'users.name')
            ->join('test_centres', 'test_centres.centre_name', '=', 'users.centre_name')
            ->where('test_centres.centre_name', Auth::user()->centre_name)
            ->select(['covid_tests.*', 'test_centres.centre_name'])->paginate(5);

        return view('covid-test.index', compact( 'data'))
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
            'officer_name' => 'required|max:64',
            'patient_name' => 'required|max:64',
            'test_date' => 'required',
            'test_name' => 'required',
            'symptomps' => 'required|max:255',
            'result_date' => 'required',
            'status' => 'required',
            'result' => 'required|max:100',
        ]);

        $data = DB::table('test_kits')
            ->join('test_centres', 'test_kits.centre_id', '=', 'test_centres.id')
            ->where('test_centres.centre_name', Auth::user()->centre_name)
            ->where('test_kits.test_name', $request->test_name)
            ->where('test_kits.stock', '>' ,'0')
            ->first();

        if($data){
            TestKit::where('test_name', $request->test_name)->decrement('stock', 1);
        }else{
            return redirect()->route('covid-test.create')
                ->with('error','Sorry, test kit stock is empty!');
        }

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
        if(Auth::user()->name == $covidTest->officer_name){
            return view('covid-test.show',compact('covidTest'));
        }else{
            return redirect()->route('covid-test.index')
                ->with('error','Sorry, you cant access this data!');
        }
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

        if(Auth::user()->name == $covidTest->officer_name){
            return view('covid-test.edit', compact('user', 'testcentres', 'covidTest'));
        }else{
            return redirect()->route('covid-test.index')
                ->with('error','Sorry, you cant access this data!');
        }
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
            'symptomps' => 'required|max:255',
            'result_date' => 'required',
            'status' => 'required',
            'result' => 'required|max:100',
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
