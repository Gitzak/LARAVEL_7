@if (session()->has('status'))
    <div class="alert alert-success" role="alert">
        <strong>Info : </strong> {{ session()->get('status') }}
    </div>
@endif