    <div class="col-md-12">
        <div class="form-group col-md-3 d-inline-block px-0 float-left">
            <label for="pageno">Page No</label>
            <div class="col-md-12 px-0">
                <input type="text" value="{{ old('pageno', isset($page)?$page->pageno:null) }}" name="pageno" id="pageno" class="form-control form-control-line @error('pageno') is-invalid @enderror">
            </div>
            @error('pageno')
                <div class="text-danger">{{ 'Enter Page No' }}</div>
            @enderror
        </div>
        <div class="form-group col-md-8 d-inline-block px-0 float-right">
            <label for="pagename" >Name</label>
            <div class="col-md-12 px-0">
                <input type="text" value="{{ old('pagename', isset($page)?$page->pagename:null) }}" name="pagename" id="pagename" class="form-control form-control-line @error('pagename') is-invalid @enderror">
            </div>
            @error('pagename')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
            @php
            if(old('operatorid')){
                $operatorid=old('operatorid');
            }
            elseif(isset($page)){
                $operatorid=$page->operatorid;
            }
            else{
                $operatorid=null;
            }
        @endphp
        <label for="operatorid">Operator</label>
        <div class="col-md-12">
            <select name="operatorid" id="operatorid" class="form-control form-control-line  @error('operatorid') is-invalid @enderror">
                <option value="">---- Select ----</option>
            @foreach ($operators as $operator)
                <option @if ($operatorid==$operator->id) selected @endif value="{{ $operator->id }}">{{ $operator->employeename }}</option>
            @endforeach
            </select>
        </div>
        @error('operatorid')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="tracingtime_1st_edition">Tracing Time (First Edition)</label>
        <div class="col-md-12">
            <input type="time" value="{{ old('tracingtime_1st_edition', isset($page)?$page->tracingtime_1st_edition:null) }}" name="tracingtime_1st_edition" id="tracingtime_1st_edition" class="form-control form-control-line @error('tracingtime_1st_edition') is-invalid @enderror">
        </div>
        @error('tracingtime_1st_edition')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="tracingtime_2nd_edition">Tracing Time (Second Edition)</label>
        <div class="col-md-12">
            <input type="time" value="{{ old('tracingtime_2nd_edition', isset($page)?$page->tracingtime_2nd_edition:null) }}" name="tracingtime_2nd_edition" id="tracingtime_2nd_edition" class="form-control form-control-line @error('tracingtime_2nd_edition') is-invalid @enderror">
        </div>
        @error('tracingtime_2nd_edition')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        @php
            if(old('status')){
                $status=old('status');
            }
            elseif(isset($page)){
                $status=$page->status; //Department Name from database
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
