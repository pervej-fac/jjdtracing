@extends('layouts.theme1.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                    <a href="{{ route('page.create') }}" class="btn btn-primary">Add New</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Page No</th>
                                <th scope="col">Page Name</th>
                                <th scope="col">Operator Name</th>
                                <th scope="col">Tracing Time-1st</th>
                                <th scope="col">Tracing Time-2nd</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $page->pageno }}</td>
                                        <td>{{ $page->pagename }}</td>
                                        <td>{{ $page->employee->employeename }}</td>
                                        <td>{{ $page->tracingtime_1st_edition }}</td>
                                        <td>{{ $page->tracingtime_2nd_edition }}</td>
                                        <td>{{ $page->status }}</td>
                                        <td>
                                            <a href="{{ route('page.edit',$page->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('page.destroy',$page->id) }}" method="POST" style="display:inline">
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
        </div>
    </div>
@endsection
