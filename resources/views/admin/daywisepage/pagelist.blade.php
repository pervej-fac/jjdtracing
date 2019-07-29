<div class="table-responsive">
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Page No</th>
            <th scope="col">Page Name</th>
        </thead>
        <tbody>
                @foreach ($pages as $page)
                    <input name="dayid" type="hidden" value="{{ $day_id }}">
                    <input name="pageid" type="hidden" value="{{ $page->id }}">
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td><input name="pageno" type="text" value="{{ $page->pageno }}"></td>
                        <td><input name="pagename" type="text" value="{{ $page->pagename }}"></td>
                        <td><input name="ischecked" type="checkbox" value="1"></td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
