<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestCentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testCentre = TestCentre::latest()->paginate(5);

        return view('manager.testcentre', compact('testCentre'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.addtestcentre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $centre_name = auth()->user()->centre_name;
        $data=db::table('test_centres')->where('centreName', $centre_name)->first();

        if($data){
            return redirect()->route('testCentre.index')
                ->with('success', 'Sorry, you already created test centre.');
        }
        else{
            $request->validate([
                'centreName' => 'required',
                'address' => 'required',
                'postalCode' => 'required',
                'phone' => 'required',
                'city' => 'required',
            ]);

            TestCentre::create($request->all());

            User::where('id', $request->user()['id'])->update([
                'centre_name' => $request->centreName
            ]);

            return redirect()->route('testCentre.index')
                ->with('success', 'Test Centre created successfully.');
        }
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
        return view('manager.edittestcentre', compact('testCentre'));
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
        $request->validate([
            'centreName' => 'required',
            'address' => 'required',
            'postalCode' => 'required',
            'phone' => 'required',
            'city' => 'required',
        ]);

        $testCentre->update($request->all());

        return redirect()->route('testCentre.index')
            ->with('success','Test Centre updated successfully.');
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

        return redirect()->route('testCentre.index')
            ->with('success','Test Centre deleted successfully');
    }
}
