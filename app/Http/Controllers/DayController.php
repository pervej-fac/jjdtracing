<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use App\Page;
use App\DaywisePage;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']="Day List";
        $data['days']=Day::orderBy('id','ASC')->get();
        $data['serial']=1;
        return view('admin.daywisepage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pages']=Page::orderBy('id', 'ASC')->get();
        $data['day_id']=$id;
        $data['serial']=1;
        $data['pageListView']=view('admin.daywisepage.pagelist',$data)->render();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($day_id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function savePages(Request $request){
        $request_data=$request->except('_token','pageno','pagename');

            foreach($request->dayid as $key=>$value){
                if(isset($request->status)){
                    if(array_key_exists($request->pageid[$key],$request->status)){
                        $request_data=array(
                            'day_id'=>$request->dayid[$key],
                            'page_id'=>$request->pageid[$key],
                            'status'=>$request->status[$request->pageid[$key]]

                        );
                        DaywisePage::create($request_data);
                    }
                }
                else{
                    session()->flash('message','No page selected!');
                    return redirect()->back();
                }
            }
            session()->flash('message','Page added successfully!');
        return redirect()->back();
    }
}
