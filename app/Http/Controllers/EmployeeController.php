<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role=='admin'){
            $employees=Employee::getAllRecords();
            return view('employee/index',compact('employees'));
        }
        return view('employee.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
            'name' => ['required', 'string', 'max:255'],
            'fatherName' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'max:11'],
            'gender' => ['required'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create(['name' => $request['name'],
            'fatherName' => $request['fatherName'],
            'contact' => $request['contact'],
            'gender' => $request['gender'],
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])]);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::getEmployee($id);
        return view('employee.edit',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::getEmployee($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'fatherName'=>['required','string','max:255'],
            'contact'=>['required','max:11'],
            'gender'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $employee->update([
            'name'=>$request['name'],
            'fatherName'=>$request['fatherName'],
            'contact'=>$request['contact'],
            'gender'=>$request['gender'],
            'email' => $request['email']
        ]);

        return redirect()->route('employee.index')
            ->with('Success','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::deleteEmployee($id);
        return redirect()->route('employee.index')->with('Success','Employee Deleted Successfully');
    }
}
