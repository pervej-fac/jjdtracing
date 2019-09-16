@extends('layouts.theme1.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form  method="post" class="form-horizontal form-material">
                    @csrf
                    @method('put')
                    <div class="form-header">
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
                                <td style="border-bottom: 1px solid">{{ $serial++ }}</td>
                                <td style="width:65px"><input type="text" value={{ $tracing->page_no }} name="page_no" id="page_no" style="width:65px"></td>
                                <td style="width:120px"><input type="text" value={{ $tracing->page_name }} name="page_name" id="page_name" style="width:120px"></td>
                                <td style="width:50px"><input type="text" value={{ $tracing->edition }} name="edition" id="edition" style="width:50px"></td>
                                <td style="width:120px">
                                    {{--  <input type="text" value={{ $tracing->page_name }} name="" id="operator_id" >  --}}
                                <select name="operator_id" id="operator_id" style="width:120px">
                                    @foreach ($operators as $operator)
                                    <option value="{{ $operator->id }}" @if ($tracing->operator_id==$operator->id) selected
                                            @endif>{{ $operator->employeename }}</option>
                                    @endforeach
                                </select>
                                </td>
                                <td style="width:70px"><input type="text" value={{ $tracing->tracing_time }} name="tracing_time" id="tracing_time" style="width:70px"></td>
                                <td style="width:100px"><input type="time"  name="printed_time" id="printed_time" style="width:100px"></td>
                                <td style="width:100px"><input type="time"  name="recieved_time" id="recieved_time" style="width:100px"></td>
                                <td style="width:120px"><input type="text"  name="recieved_by" id="recieved_by" style="width:120px"></td>
                                <td style="width:50px"><input type="text"  name="status" id="status" style="width:50px"></td>
                                <td style="width:100px"><input type="text"  name="remarks" id="remarks" style="width:100px"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                <hr>
                    <div class="form-group" style="margin-top: 20px">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Apply Changes</button>
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

