@extends('layouts.theme1.master')
@section('content')
<div class="offset-2 col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material">
                <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                        <input type="password" value="password" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Message</label>
                    <div class="col-md-12">
                        <textarea rows="5" class="form-control form-control-line"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Select Country</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line">
                            <option>London</option>
                            <option>India</option>
                            <option>Usa</option>
                            <option>Canada</option>
                            <option>Thailand</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
