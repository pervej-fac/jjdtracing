<div class="form-group col-md-12">
    <label for="deptname" >Department Name</label>
    <div class="col-md-12 px-0">
        <input type="text" value="{{ old('departmentname', isset($department)?$department->departmentname:null) }}" name="departmentname" id="deptname" class="form-control form-control-line @error('departmentname') is-invalid @enderror">
    </div>
    @error('departmentname')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-12">
    <label for="details" >Details</label>
    <div class="col-md-12 px-0">
        <textarea name="details" id="details" cols="30" rows="5" class="form-control form-control-line">{{ old('details', isset($department)?$department->details:null) }}</textarea>
    </div>
</div>
