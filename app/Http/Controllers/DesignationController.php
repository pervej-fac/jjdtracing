<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Designation List';
        $data['designations']=Designation::orderBy('id', 'DESC')->get();
        $data['serial']=1;
        return view('admin.designation.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create Designation';
        return view('admin.designation.create',$data);
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
            'designation'=>'required'
        ]);
        $designation=$request->except('_token');
        Designation::create($designation);
        session()->flash('message','Designation created successfully');
        return redirect()->route('designation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        $data['title']="Edit Designation";
        $data['designation']=$designation;
        return view('admin.designation.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'designation'=>'required'
        ]);
        $designation_req=$request->except('_token');
        $designation->update($designation_req);
        session()->flash('message','Designation updated successfully');
        return redirect()->route('designation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        session()->flash('message','Designation deleted successfully');
        return redirect()->route('designation.index');
    }
}
