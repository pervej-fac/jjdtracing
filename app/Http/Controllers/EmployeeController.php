<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Department;
use App\Designation;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Employee List';
        $data['employees']=Employee::with('designation','department')->orderBy('id', 'DESC')->get();
        $data['serial']=1;
        return view('admin.employee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create Employee';
        $data['departments']=Department::orderBy('departmentname')->get();
        $data['designations']=Designation::orderBy('designation')->get();
        return view('admin.employee.create',$data);
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
            'employeeid'=>'required',
            'employeename'=>'required',
            'designation_id'=>'required',
            'department_id'=>'required',
            'mobile'=>'required',
            'status'=>'required'
        ]);

        // $data['employeeid']=$request->employeeid;
        // $data['employeename']=$request->employeename;
        // $data['designation']=$request->designation;
        // $data['department']=$request->department;
        // $data['mobile']=$request->mobile;
        // $data['status']=$request->status;
        $employee_r=$request->except('_token');
        // dd($employee_r);
        Employee::create($employee_r);
        session()->flash('message','Employee created successfully!');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
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
        $data['title']="Edit employee";
        $data['departments']=Department::orderBy('departmentname')->get();
        $data['designations']=Designation::orderBy('designation')->get();
        $data['employee']=Employee::findOrFail($id);
        return view('admin.employee.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'employeeid'=>'required',
            'employeename'=>'required',
            'designation_id'=>'required',
            'department_id'=>'required',
            'mobile'=>'required',
            'status'=>'required'
        ]);
        $employee_r=$request->except('_token');
        // dd($employee_r);
        $employee->update($employee_r);
        session()->flash('message','Employee updated successfully!');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrfail($id)->delete($id);
        session()->flash('message','Employee deleted successfully');
        return redirect()->route('employee.index');
    }
}
