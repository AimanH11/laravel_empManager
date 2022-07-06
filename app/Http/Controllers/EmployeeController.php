<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Auth;
use App\Models\Employee;
use Illuminate\Http\Request;
use app\Account;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::where('user_id',Auth::id() )->get();
        return view('employees.index')->with('employeeArr', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new employee;
        $res->name = $request->input('name');
        $res->email = $request->input('email');
        $res->date_of_joining = $request->input('date_of_joining');
        $res->bio = $request->input('bio');
        $res->user_id = auth()->user()->id;
        $res->save();

        $request->session()->flash('msg', 'Employee added sucessfully');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('employees.edit')->with('employeeArr',Employee::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'bio' => 'required',
            ]);
        $res = Employee::find($id);
        $res->name = $request->name;
        $res->email = $request->email;
        $res->date_of_joining = $request->date_of_joining;
        $res->bio = $request->bio;
        $res->user_id = auth()->user()->id;
        $res->save();

        $request->session()->flash('msg', 'Employee updated sucessfully');
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Employee::destroy(array('id',$id));

        return redirect('home');
    }
}
