@extends('layouts.theme1.master')
@section('content')
    <div class="col-md-7 col-lg-8 col-xlg-9 offset-2">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('page.update',$page->id) }}" method="post" class="form-horizontal form-material">
                    @csrf
                    @method('put')
                    @include('admin.page._form')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
