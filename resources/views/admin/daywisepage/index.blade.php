@extends('layouts.theme1.master')
@push('custom-css')
    <style>
        .modal-dialog,
    #pageList .modal-content {
        /* 80% of window height */
        width:100%;
        height: 70%;
    }

    #pageList .modal-body {
        /* 100% = dialog height, 120px = header + footer */
        max-height: calc(100% - 120px);
        max-width:100%;
        overflow-y: scroll;
    }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#generateTracing">Generate Tracing</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($days as $day)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $day->name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary btn-add-pages" day-id="{{ $day->id }}" day-name="{{ $day->name }}" url="{{ route('day.show', $day->id) }}" data-toggle="modal" data-target="#pageList">Add Pages</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                //Generate Tracing Modal
                <div class="modal fade" id="generateTracing" tabindex="-1" role="dialog" aria-labelledby="pageListLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Select Tracing date</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('tracing.store') }}" method="POST">
                                    @csrf
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" name="tracingDate" id="tracingDate">
                                                </div>
                                                    <button type="submit" class="btn btn-primary">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                //Show Pages Modal
                <div class="modal fade" id="pageList" tabindex="-1" role="dialog" aria-labelledby="pageListLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Pages</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                    {{-- <div class="col-md-12">
                                        <input type="hidden" name="dayid" id="dayid" class="">
                                        <input type="text" name="dayname" id="dayname" class="" readonly>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <span class="showPages">OK<span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" form="addPageForm">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection

@push('custom-js')
    <script>
        $(function(){
            $('.btn-add-pages').click(function(){
                var dayid
               /* $('#dayid').val($(this).attr('day-id'));
                $('#dayname').val($(this).attr('day-name'));*/
                var url=$(this).attr('url');
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data){
                        //alert(JSON.stringify(data));
                        //$.('.showPages').html(data.pageListView);
                        $('.showPages').html(data.pageListView);
                        //$('.headerCartDetails').html(data.headerCartDetailsView);
                    },
                    error: function(data){
                        alert('Error');
                    }
                });
            });
        });
    </script>
@endpush
