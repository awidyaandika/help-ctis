<?php

namespace App\Http\Controllers;

use App\Models\TestCentre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = DB::table('users')->where('position', 'patient')->paginate(5);

        return view('patient.index', compact('patients'))
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
        return view('patient.create', compact('testcentres'));
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
            'username' => 'required|unique:users|max:16',
            'name' => 'required|max:64',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|unique:users|max:64',
            'phone' => 'required|unique:users|max:20',
            'address' => 'required|max:255',
            'position' => 'required',
        ]);

        $request['password'] = bcrypt($request->password);

        User::create($request->all());

        return redirect()->route('patient.index')
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
        $patient = User::find($id);

        if(Auth::user()->centre_name == $patient->centre_name){
            return view('patient.show', compact('patient'));
        }else{
            return redirect()->route('patient.index')
                ->with('error','Sorry, you cant access this data!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = User::find($id);

        if(Auth::user()->centre_name == $patient->centre_name){
            return view('patient.edit', compact('patient'));
        }else{
            return redirect()->route('patient.index')
                ->with('error','Sorry, you cant access this data!');
        }
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
            'name' => 'required|max:64',
            'address' => 'required|max:255',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'max:16'
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'max:64'
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'max:20'
            ],
            'password' => 'confirmed',
        ]);

        $req = $request->except('_token', '_method', 'password', 'password_confirmation');
        if($request->password) {
            $req['password'] = bcrypt($request->password);
        }

        $user->update($req);

        return redirect()->route('patient.index')
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
        $patient = User::find($id);
        $patient->delete();

        return redirect()->route('patient.index')
            ->with('success', 'Data has been deleted successfully');
    }
}
