@extends('layouts.theme1.master')
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

                                            <a href="{{ route('day.edit',$day->id) }}" class="btn btn-sm btn-primary">Add Pages</a>

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
        </div>
    </div>
@endsection
