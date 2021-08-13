@if ($message = Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
@endif
