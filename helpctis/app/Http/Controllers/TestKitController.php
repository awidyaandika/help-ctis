<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use App\Models\TestKit;
use Illuminate\Http\Request;
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
            'stock' => 'required',
        ]);

        TestKit::create($request->all());

        return redirect()->route('test-kit.index')
            ->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function show(TestKit $testKit)
    {
        return view('test-kit.show',compact('testKit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function edit(TestKit $testKit)
    {
        return view('test-kit.edit', compact('testKit'));
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
            'stock' => 'required',
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
