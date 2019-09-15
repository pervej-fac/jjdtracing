@extends('layouts.theme1.master')
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
                                <th scope="col">Tracing No</th>
                                <th scope="col">Tracing Date</th>
                                <th scope="col">Publication date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($tracings as $tracing)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $tracing->tracing_no }}</td>
                                        <td>{{ date('d-M-Y',strtotime($tracing->tracing_date)) }}</td>
                                        <td>{{ date('d-M-Y',strtotime($tracing->publication_date)) }}</td>
                                        <td>{{ ucfirst($tracing->status) }}</td>
                                        <td>
                                            <a href="{{ route('tracing.edit',$tracing->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('tracing.destroy',$tracing->id) }}" method="POST" style="display:inline">
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

        </div>
    </div>
@endsection
