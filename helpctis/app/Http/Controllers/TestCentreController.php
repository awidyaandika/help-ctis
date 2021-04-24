<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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

        $data = DB::table('test_centres')
            ->join('users', 'test_centres.centre_name', '=', 'users.centre_name')
            ->where('test_centres.centre_name', Auth::user()->centre_name)
            ->where('users.name', Auth::user()->name)
            ->count();

        return view('test-centre.index', compact('testcentres', 'data'))
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
                ->with('error', 'Sorry, you already created test centre');
        }else{
            $request->validate([
                'centre_name' => 'required|unique:test_centres|max:32',
                'address' => 'required|unique:test_centres|max:255',
                'postal_code' => 'required|max:8',
                'phone' => 'required|unique:test_centres|max:20',
                'city' => 'required|max:32',
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
        if(Auth::user()->centre_name == $testCentre->centre_name){
            return view('test-centre.show',compact('testCentre'));
        }else{
            return redirect()->route('test-centre.index')
                ->with('error','Sorry, you cant access this data!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestCentre  $testCentre
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCentre $testCentre)
    {
        if(Auth::user()->centre_name == $testCentre->centre_name){
            return view('test-centre.edit', compact('testCentre'));
        }else{
            return redirect()->route('test-centre.index')
                ->with('error','Sorry, you cant access this data!');
        }


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
            'centre_name' => [
                'required',
                Rule::unique('test_centres')->ignore($testCentre->id),
                'max:32'
            ],
            'address' => [
                'required',
                Rule::unique('test_centres')->ignore($testCentre->id),
                'max:255'
            ],
            'postal_code' => 'required|max:8',
            'phone' => [
                'required',
                Rule::unique('test_centres')->ignore($testCentre->id),
                'max:20'
            ],
            'city' => 'required|max:32',
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
