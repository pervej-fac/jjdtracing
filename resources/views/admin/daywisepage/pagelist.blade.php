<form action="{{ route('daywisepage.save',$day_id) }}" method="POST" id="addPageForm">
        @csrf
<div class="table-responsive">
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Page No</th>
            <th scope="col">Page Name</th>
            <th scope="col">Status</th>
        </thead>
        <tbody>
            @php
            /*$chkPages=array(json_decode($checkedPages));
            dd($chkPages)*/
            $chkPagesList=array();
            foreach($checkedPages as $chkPage){
                array_push($chkPagesList,$chkPage->page_id);
            }
            @endphp

                @foreach ($pages as $page)
                    <input name="dayid[]" type="hidden" value="{{ $day_id }}">
                    <input name="pageid[]" type="hidden" value="{{ $page->id }}">
                    {{--  <input name="pageno[]" type="hidden" value="{{ $page->pageno }}" style="width:70px">  --}}
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td> {{ $page->pageno }}</td>
                        <td>{{ $page->pagename }}</td>
                        <td><span class="form-control"><input name="status[{{ $page->id }}]" type="checkbox" value="1"
                            @if (in_array($page->id,$chkPagesList))
                                checked
                            @endif
                            {{--  @foreach ($checkedPages as $chkPage)
                                @if ($chkPage->page_id==$page->id)
                                    checked
                                @endif
                            @endforeach  --}}
                            ></span></td>

                        {{--  <td><input name="active[]" type="text" value="" class="form-control"></td>  --}}
                        {{--  <td>{{ $checkedPages }}</td>  --}}
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
</form>
