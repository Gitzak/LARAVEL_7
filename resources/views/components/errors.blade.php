@if($errors->any())
<div class="row alert alert-danger">
    <div class="col-12 mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif