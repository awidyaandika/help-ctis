<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use App\Models\TestKit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestKitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testkit = TestKit::latest()->paginate(5);
        $data = DB::table('test_kits')->join('test_centres', 'test_kits.centre_id', '=', 'test_centres.id')
            ->select(['test_kits.*', 'test_centres.centre_name'])->get();

        return view('test-kit.index', compact('testkit', 'data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testcentres = TestCentre::latest()->paginate(5);
        return view('test-kit.create', compact('testcentres'));
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
            'centre_id' => 'required',
            'test_name' => 'required',
            'stock' => 'required|max:11',
        ]);

        $data = DB::table('test_kits')
            ->join('test_centres', 'test_kits.centre_id', '=', 'test_centres.id')
            ->join('users', 'test_centres.centre_name', '=', 'users.centre_name')
            ->where('users.name', Auth::user()->name)
            ->where('test_name', $request->test_name)
            ->first();

        if($data){
            return redirect()->route('test-kit.create')
                ->with('error','Sorry, you cannot add the same test name!');
        }else{
            TestKit::create($request->all());

            return redirect()->route('test-kit.index')
                ->with('success','Data created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function show(TestKit $testKit)
    {
        if(Auth::user()->centre_name == $testKit->testCentre->centre_name){
            return view('test-kit.show',compact('testKit'));
        }else{
            return redirect()->route('test-kit.index')
                ->with('error','Sorry, you cant access this data!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function edit(TestKit $testKit)
    {
        if(Auth::user()->centre_name == $testKit->testCentre->centre_name){
            return view('test-kit.edit', compact('testKit'));
        }else{
            return redirect()->route('test-kit.index')
                ->with('error','Sorry, you cant access this data!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestKit $testKit)
    {
        $request->validate([
            'test_name' => 'required',
            'stock' => 'required|max:11',
        ]);

        $testKit->update($request->all());

        return redirect()->route('test-kit.index')
            ->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestKit $testKit)
    {
        $testKit->delete();

        return redirect()->route('test-kit.index')
            ->with('success', 'Data has been deleted successfully');
    }
}
