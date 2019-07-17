    <div class="col-md-12">
        <div class="form-group col-md-3 d-inline-block px-0 float-left">
            <label for="empid">ID</label>
            <div class="col-md-12 px-0">
                <input type="text" value="{{ old('employeeid', isset($employee)?$employee->employeeid:null) }}" name="employeeid" id="empid" class="form-control form-control-line @error('employeeid') is-invalid @enderror">
            </div>
            @error('employeeid')
                <div class="text-danger">{{ 'Enter employeeid' }}</div>
            @enderror
        </div>
        <div class="form-group col-md-8 d-inline-block px-0 float-right">
            <label for="empname" >Name</label>
            <div class="col-md-12 px-0">
                <input type="text" value="{{ old('employeename', isset($employee)?$employee->employeename:null) }}" name="employeename" id="empname" class="form-control form-control-line @error('employeename') is-invalid @enderror">
            </div>
            @error('employeename')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
            @php
            if(old('designation')){
                $designation_id=old('designation');
            }
            elseif(isset($employee)){
                $designation_id=$employee->designation_id; //Department Name from database
            }
            else{
                $designation_id=null;
            }
        @endphp
        <label for="desig">Designation</label>
        <div class="col-md-12">
            <select name="designation_id" id="desig" class="form-control form-control-line  @error('designation') is-invalid @enderror">
                <option value="">---- Select ----</option>
            @foreach ($designations as $designation)
                <option @if ($designation_id==$designation->id) selected @endif value="{{ $designation->id }}">{{ $designation->designation }}</option>
            @endforeach
            </select>
        </div>
        @error('designation_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
            @php
                if(old('department_id')){
                    $department_id=old('department_id');
                }
                elseif(isset($employee)){
                    $department_id=$employee->department_id; //Department Name from database
                }
                else{
                    $department_id=null;
                }
            @endphp
            <label for="dept">Department</label>
            <div class="col-md-12">
                <select name="department_id" id="dept" class="form-control form-control-line @error('department_id') is-invalid @enderror">
                    <option value="">---- Select ----</option>
                @foreach ($departments as $department)
                    <option @if ($department_id==$department->id) selected @endif value="{{ $department->id }}">{{ $department->departmentname }}</option>
                @endforeach

                </select>
            </div>
            @error('department_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group">
        <label for="mobile">Mobile No</label>
        <div class="col-md-12">
            <input type="text" value="{{ old('mobile', isset($employee)?$employee->mobile:null) }}" name="mobile" id="mobile" class="form-control form-control-line @error('mobile') is-invalid @enderror">
        </div>
        @error('mobile')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        @php
            if(old('status')){
                $status=old('status');
            }
            elseif(isset($employee)){
                $status=$employee->status; //Department Name from database
            }
            else{
                $status=null;
            }
        @endphp
        <label for="status">Status</label>
        <div class="col-md-12">
            <input type="radio" value="active" name="status" @if ($status=="active") checked @endif> Active
        </div>
        <div class="col-md-12">
             <input type="radio" value="inactive" name="status" @if ($status=="inactive") checked @endif> Inactive
        </div>
        @error('status')
                <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
