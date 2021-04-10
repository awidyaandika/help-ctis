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
        $testcentres = TestCentre::latest()->paginate(5);

        return view('test-centre.index', compact('testcentres'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test-centre.create');
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
        $data = DB::table('test_centres')->where('centre_name', $centre_name)->first();

        if($data){
            return redirect()->route('test-centre.index')
                ->with('success', 'Sorry, you already created test centre');
        }else{
            $request->validate([
                'centre_name' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'phone' => 'required',
                'city' => 'required',
            ]);

            User::where('id', $request->user()['id'])->update([
                'centre_name' => $request->centre_name
            ]);

            TestCentre::create($request->all());

            return redirect()->route('test-centre.index')
                ->with('success','Data created successfully');
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
        return view('test-centre.show',compact('testCentre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestCentre  $testCentre
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCentre $testCentre)
    {
        return view('test-centre.edit', compact('testCentre'));
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
            'centre_name' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
            'city' => 'required',
        ]);

        User::where('id', $request->user()['id'])->update([
            'centre_name' => $request->centre_name
        ]);

        $testCentre->update($request->all());

        return redirect()->route('test-centre.index')
            ->with('success','Data updated successfully');
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

        return redirect()->route('test-centre.index')
            ->with('success', 'Data has been deleted successfully');
    }
}
