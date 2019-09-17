@extends('layouts.theme1.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tracing.update',$tracing_data->id) }}"  method="post" class="form-horizontal form-material">
                    @csrf
                    @method('put')
                    <div class="form-header">
                    <input type="hidden" value="{{ $tracing_data->id }}" name="tracing_id" id="tracing_id">
                    <div class="col-md-6">
                        <div class="input-group input-form">
                            <span class="input-group-addon">Tracing No</span>
                            <input type="text" value="{{ $tracing_data->tracing_no }}" id="tracing_no" name="tracing_no" class="form-control " readonly="yes">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-form">
                            <span class="input-group-addon">Tracing Date</span>
                            <input type="text" value="{{ $tracing_data->tracing_date }}" id="tracing_date" name="tracing_date" class="form-control " readonly="yes">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-form">
                            <span class="input-group-addon">Publication Date</span>
                            <input type="text" value="{{ $tracing_data->publication_date }}" id="publication_date" name="publication_date" class="form-control " readonly="yes">
                        </div>
                    </div>
                    </div>


                <hr>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                            <tr>
                                <th>Sl</th>
                                <th>Page No</th>
                                <th>Page Name</th>
                                <th>Edition</th>
                                <th>Operator</th>
                                <th>Time</th>
                                <th>Printed</th>
                                <th>Recieved</th>
                                <th>Recieved By</th>
                                <th>Status</th>
                                <th>Remarks</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($tracing_data->tracing_details as $tracing)
                            {{--  <input type="text" value={{ $tracing->page_name }}>  --}}
                            <tr>
                                <input type="hidden" name="id[]" id="id" value={{ $tracing->id }}>
                                <input type="hidden" name="tracing_detail_id[]" id="tracing_detail_id" value={{ $tracing->tracing_id }}>
                                <td style="border-bottom: 1px solid">{{ $serial++ }}</td>
                                <td style="width:65px"><input type="text" name="page_no[]" id="page_no" style="width:65px" value={{ $tracing->page_no }}></td>
                                <td style="width:120px"><input type="text" name="page_name[]" id="page_name" style="width:120px" value="{{ $tracing->page_name }}"></td>
                                <td style="width:50px"><input type="text" name="edition[]" id="edition" style="width:50px" value={{ $tracing->edition }}></td>
                                <td style="width:120px">
                                    {{--  <input type="text" value={{ $tracing->page_name }} name="" id="operator_id" >  --}}
                                <select name="operator_id[]" id="operator_id" style="width:120px">
                                    @foreach ($operators as $operator)
                                    <option value="{{ $operator->id }}" @if ($tracing->operator_id==$operator->id) selected
                                            @endif>{{ $operator->employeename }}</option>
                                    @endforeach
                                </select>
                                </td>
                                <td style="width:70px"><input type="text" name="tracing_time[]" id="tracing_time" style="width:70px" value={{ $tracing->tracing_time }}></td>
                                <td style="width:100px"><input type="time" name="printed_time[]" id="printed_time" style="width:100px" value={{ $tracing->printed_time }}></td>
                                <td style="width:100px"><input type="time"  name="recieved_time[]" id="recieved_time" style="width:100px" value={{ $tracing->recieved_time }}></td>
                                <td style="width:120px"><input type="text" name="recieved_by[]" id="recieved_by" style="width:120px" value={{ isset($tracing->recieved_by)?$tracing->recieved_by:null }}></td>
                                <td style="width:50px"><input type="text" name="status[]" id="status" style="width:50px" value={{ isset($tracing->status)?$tracing->status:null }}></td>
                                <td style="width:100px"><input type="text" name="remarks[]" id="remarks" style="width:100px" value={{ isset($tracing->remarks)?$tracing->remarks:null }}></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                <hr>
                    <div class="form-group" style="margin-top: 20px">
                        <div class="col-sm-12">
                            <button class="btn btn-success" type="submit">Apply Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom-css')
        <style>
                .input-group-addon, .input-group-btn, .input-group .form-control {
                    display: table-cell;
                }

                .input-group .form-control {
                    position: relative;
                    z-index: 2;
                    float: left;
                    width: 100%;
                    margin-bottom: 0;
                }
                .form-control {

                    padding: 6px 12px;

                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                .input-group {
                    position: relative;
                    display: table-cell;

                }

                .tracing-details{
                    margin-top: 30px;
                }


        </style>
@endpush

