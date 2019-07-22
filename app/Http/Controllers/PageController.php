<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Employee;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Page List';
        $data['pages']=Page::with('employee')->orderBy('id', 'DESC')->get();
        $data['serial']=1;
        // dd($data);
        return view('admin.page.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create Page';
        $data['operators']=Employee::orderBy('employeename')->get();
        // $data['designations']=Designation::orderBy('designation')->get();
        return view('admin.page.create',$data);
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
            'pageno'=>'required',
            'pagename'=>'required',
            'operatorid'=>'required',
            'tracingtime'=>'required',
            'status'=>'required'
        ]);

        $page_r=$request->except('_token');
        // dd($employee_r);
        Page::create($page_r);
        session()->flash('message','Page created successfully!');
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']='Edit Page';
        $data['operators']=Employee::orderBy('employeename')->get();
        $data['page']=Page::findOrfail($id);
        return view('admin.page.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, page $page)
    {
        $request->validate([
            'pageno'=>'required',
            'pagename'=>'required',
            'operatorid'=>'required',
            'tracingtime'=>'required',
            'status'=>'required'
        ]);

        $page_r=$request->except('_token');
        $page->update($page_r);
        session()->flash('message','Page updated successfully!');
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(page $page)
    {
        Page::findOrfail($page->id)->delete($page->id);
        session()->flash('message','Page deleted successfully');
        return redirect()->route('page.index');
    }
}
