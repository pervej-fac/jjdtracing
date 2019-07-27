<div class="form-group col-md-12">
    <label for="designame" >Designation</label>
    <div class="col-md-12 px-0">
        <input type="text" value="{{ old('designation', isset($designation)?$designation->designation:null) }}" name="designation" id="designame" class="form-control form-control-line @error('designation') is-invalid @enderror">
    </div>
    @error('designation')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-12">
    <label for="details" >Details</label>
    <div class="col-md-12 px-0">
        <textarea name="details" id="details" cols="30" rows="5" class="form-control form-control-line">{{ old('details', isset($designation)?$designation->details:null) }}</textarea>
    </div>
</div>
