@extends('layouts.theme1.master')
@push('custom-css')
    <style>
        .modal-dialog,
    .modal-content {
        /* 80% of window height */
        height: 70%;
    }

    .modal-body {
        /* 100% = dialog height, 120px = header + footer */
        max-height: calc(100% - 120px);
        overflow-y: scroll;
    }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                    <a href="#" class="btn btn-primary">Add New</a>
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
                                            <form action="{{ route('day.destroy',$day->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-primary" onclick="return confirm('Are you sure, you want to delete?')">Details</button>
                                            </form>

                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#pageList">Add Pages</a>

                                            <form action="{{ route('day.destroy',$day->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-primary" onclick="return confirm('Are you sure, you want to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            //Page Model Started
            <div class="modal fade" id="pageList" tabindex="-1" role="dialog" aria-labelledby="pageListLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Pages</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-6">
                                    col-md-6
                                 </div>
                                  <div class="col-md-6 ml-auto">.col-md-4 .ml-auto</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            //Page Model End
        </div>
    </div>
@endsection


