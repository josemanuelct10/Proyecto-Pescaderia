@if($mensaje = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$mensaje}}
</div>
@endif

@if($mensaje = Session::get('deleted'))
<div class="alert alert-danger" role="alert">
    {{$mensaje}}
</div>
@endif


