@extends('layouts.theme1.master')
@section('content')
    <div class="col-md-7 col-lg-8 col-xlg-9 offset-2">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('page.store') }}" method="post" class="form-horizontal form-material">
                    @csrf
                    @include('admin.page._form')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
