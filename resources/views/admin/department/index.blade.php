@extends('layouts.theme1.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                    <a href="{{ route('department.create') }}" class="btn btn-primary">Add New</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Department Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $department->departmentname }}</td>
                                        <td>{{ $department->details }}</td>
                                        <td>
                                            <a href="{{ route('department.edit',$department->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('department.destroy',$department->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-primary" onclick="return confirm('Are you sure, you want to delete?')">Delete</button>
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