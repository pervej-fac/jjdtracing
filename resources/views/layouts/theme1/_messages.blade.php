@if(session('message'))
    <div class="text-center" style="margin: 0 0 20px 0">
        <span class="alert alert-danger">{{ session('message') }}</span>
    </div>
@endif
