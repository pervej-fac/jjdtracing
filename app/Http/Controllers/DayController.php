<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use App\Page;
use App\DaywisePage;
use Illuminate\Support\Facades\DB;

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
        $data['checkedPages']=DaywisePage::select('page_id')->where('day_id', $id)->where('status',1)->orderBy('page_id', 'asc')->get();
        // dd($data);
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

    public function savePages(Request $request,$dayid){
        $count_checked_pages=DaywisePage::where('day_id', $dayid)->where('status',1)->count();

        if(($count_checked_pages<=0) and (!isset($request->status))){
            session()->flash('message','No page selected!');
            return redirect()->back();
        }

        DB::beginTransaction();
        try{
            //Delete all pages already in database
            $pages = new DaywisePage();
            $pages=$pages->where('day_id', $dayid)->delete();

            //Insert all pages into the database
            foreach($request->dayid as $key=>$value){
                if(array_key_exists($request->pageid[$key],$request->status)){
                    $request_data=array(
                        'day_id'=>$request->dayid[$key],
                        'page_id'=>$request->pageid[$key],
                        'status'=>$request->status[$request->pageid[$key]]
                    );
                    DaywisePage::create($request_data);
                }
            }
            DB::commit();
            session()->flash('message','Page added successfully!');
            return redirect()->back();
        }catch(Exception $e){
            DB::rollback();
            Log::error('DayController@savePages Message - '.$e->getMessage());
            return redirect()->back();
        }
    }
}
