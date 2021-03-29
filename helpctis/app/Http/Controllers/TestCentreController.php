<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use Illuminate\Http\Request;

class TestCentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testcentres = TestCentre::latest()->paginate(5);

        return view('manager.testcentre', compact('testcentres'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestCentre  $testCentre
     * @return \Illuminate\Http\Response
     */
    public function show(TestCentre $testCentre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestCentre  $testCentre
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCentre $testCentre)
    {
        return view('manager.editTestCentre', compact('testCentre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestCentre  $testCentre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestCentre $testCentre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestCentre  $testCentre
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestCentre $testCentre)
    {
        $testCentre->delete();

        return redirect()->route('manager.testcentre')
            ->with('success','Test Centre deleted successfully');
    }
}
