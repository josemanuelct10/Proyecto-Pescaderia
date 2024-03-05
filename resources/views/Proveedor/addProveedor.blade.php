<!-- Vista que llama al partial -->
@extends('layouts.landing')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Agregar Proveedor</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('gestionAddProveedor') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label ">Nombre:</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{old('nombre')}}" name="nombre" >
                            @error('nombre')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label ">Direccion:</label>
                            <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" value="{{old('direccion')}}" name="direccion" >
                            @error('direccion')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" class="form-control @error('telefono') is-invalid @enderror" id="telefono" value="{{old('telefono')}}" name="telefono" >
                            @error('telefono')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría:</label>
                            <input type="text" class="form-control @error('categoria') is-invalid @enderror" id="categoria" value="{{old('categoria')}}" name="categoria" >
                            @error('categoria')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cif" class="form-label ">CIF:</label>
                            <input type="text" class="form-control @error('cif') is-invalid @enderror" id="cif" value="{{old('cif')}}" name="cif" >
                            @error('cif')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
