<?php

namespace App\Http\Controllers;

use App\Tracing;
use App\Day;
use App\Employee;
use App\TracingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class TracingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Tracing List';
        $data['tracings']=Tracing::orderBy('id','DESC')->get();
        $data['serial']=1;
        return view('admin.tracing.index', $data);
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
        DB::beginTransaction();
        try{
            //Tracing Data
            $tracing_data['tracing_no']=Carbon::parse($request->tracingDate)->format('Y-m-d').'-'.rand(0000,9999);
            $tracing_data['tracing_date']=$request->tracingDate;
            $tracing_data['publication_date']=Carbon::parse($request->tracingDate)->addDays(1)->format('Y-m-d');
            $tracing_data['status']='active';
            $tracing=Tracing::create($tracing_data);

            //Tracing Detail Data
            $daywise_pages=DB::table('days')
            ->join('daywise_pages','days.id','=','daywise_pages.day_id')
            ->join('pages','pages.id','=','daywise_pages.page_id')
            ->join('employees','employees.id','=','pages.operatorid')
            ->where('days.name',Carbon::parse($request->tracingDate)->format('l'))->get();
            // dd($daywise_pages);

            if(count($daywise_pages)>0){
                foreach($daywise_pages as $page){
                    $tracing_detail_data['tracing_id']=$tracing->id;
                    $tracing_detail_data['page_no']=$page->pageno;
                    $tracing_detail_data['page_name']=$page->pagename;
                    $tracing_detail_data['edition']="1st";
                    $tracing_detail_data['operator_id']=$page->operatorid;
                    $tracing_detail_data['tracing_time']=$page->tracingtime_1st_edition;

                    TracingDetail::create($tracing_detail_data);
                }
            }


            DB::commit();
            session()->flash('message','Tracing generated successfully.');
            return redirect()->route('tracing.index');
        }
        catch(Exception $exeption){

            DB::rollback();
            session()->flash('message','Failure Notice: Unable to generate tracing');
            return redirect()->route('tracing.index');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tracing  $tracing
     * @return \Illuminate\Http\Response
     */
    public function show(Tracing $tracing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tracing  $tracing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$data['title']='Edit Page';
        $data['operators']=Employee::orderBy('employeename')->get();
        $data['page']=Page::findOrfail($id);
        return view('admin.page.edit',$data);*/

        $data['title']='Tracing Records';
        $data['serial']=1;
        // $data['tracing']=Tracing::where('id',$id)->get();
        $data['tracing_data']=Tracing::with('tracing_details')->findOrfail($id);
        $data['operators']=Employee::where('status','active')->get();
        // dd($data['tracing_data']);
        // dd($data['operators']);
        return view('admin.tracing.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tracing  $tracing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracing $tracing)
    {

        $request->validate([
            'tracing_id'=>'required',
            'page_no'=>'required',
            'page_name'=>'required',
            'edition'=>'required',
            'operator_id'=>'required',
            'tracing_time'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tracing->findOrFail($request->tracing_id)->update(['tracing_no'=>$request->tracing_no,'tracing_date'=>$request->tracing_date,'publication_date'=>$request->publication_date]);

            if(count($request->id)>0){
                for($i=0;$i<count($request->id);$i++){
                    $detail=TracingDetail::findOrFail($request->id[$i]);

                    $detail->tracing_id=$request->tracing_detail_id[$i];
                    $detail->page_no=$request->page_no[$i];
                    $detail->page_name=$request->page_name[$i];
                    $detail->edition=$request->edition[$i];
                    $detail->operator_id=$request->operator_id[$i];
                    $detail->tracing_time=$request->tracing_time[$i];
                    $detail->printed_time=$request->printed_time[$i];
                    $detail->recieved_time=$request->recieved_time[$i];
                    $detail->recieved_by=$request->recieved_by[$i];
                    $detail->status=$request->status[$i];
                    $detail->remarks=$request->remarks[$i];

                    $detail->save();
                }
            }
            DB::commit();
            session()->flash('message','Tracing updated successfully!');
            return redirect()->route('tracing.index');
        }catch(Exeption $e){
            DB::rollback();
            session()->flash('message','Failure Notice: Unable to update!');
            return redirect()->route('tracing.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tracing  $tracing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracing $tracing)
    {
        //
    }
}
