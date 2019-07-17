@extends('layouts.theme1.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                    <a href="{{ route('employee.create') }}" class="btn btn-primary">Add New</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Department</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $employee->employeeid }}</td>
                                        <td>{{ $employee->employeename }}</td>
                                        <td>{{ $employee->designation->designation }}</td>
                                        <td>{{ $employee->department->departmentname }}</td>
                                        <td>{{ $employee->mobile }}</td>
                                        <td>{{ $employee->status }}</td>
                                        <td>
                                            <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
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
