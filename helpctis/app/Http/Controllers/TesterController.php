<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testers = DB::table('users')->where('position', 'tester')->paginate(5);

        return view('tester.index', compact('testers'))
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
        return view('tester.create', compact('testcentres'));
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
            'centre_name' => 'required',
            'password' => ['required', 'string', 'confirmed'],
            'username' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);

        $request['password'] = bcrypt($request->password);

        User::create($request->all());

        return redirect()->route('tester.index')
            ->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tester = User::find($id);
        return view('tester.show', compact('tester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tester = User::find($id);
        return view('tester.edit', compact('tester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'password' => 'confirmed',
        ]);

        $req = $request->except('_token', '_method', 'password', 'password_confirmation');
        if($request->password) {
            $req['password'] = bcrypt($request->password);
        }

        $user->update($req);

        return redirect()->route('tester.index')
            ->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tester = User::find($id);
        $tester->delete();

        return redirect()->route('tester.index')
            ->with('success', 'Data has been deleted successfully');
    }
}
