<!-- Vista que llama al partial -->
@extends('layouts.landing')
@section('title', 'Añadir Pescado')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Agregar Pescado</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('gestionAddPescado') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="creador" id="creador" value="{{ auth()->id() }}">

                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" >
                            @error('nombre')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label @error('descripcion') is-invalid @enderror">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" ></textarea>
                            @error('descripcion')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="origen" class="form-label @error('descripcion') is-invalid @enderror">Origen:</label>
                            <input type="text" class="form-control" id="origen" name="origen" >
                            @error('origen')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="precioKG" class="form-label">Precio por KG:</label>
                            <input type="number" class="form-control @error('precioKG') is-invalid @enderror" id="precioKG" name="precioKG" step="0.01" >
                            @error('precioKG')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" >
                            @error('cantidad')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fechaCompra" class="form-label">Fecha de Compra:</label>
                            <input type="date" class="form-control @error('fechaCompra') is-invalid @enderror" id="fechaCompra" name="fechaCompra" >
                            @error('fechaCompra')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría:</label>
                            <input type="text" class="form-control @error('categoria') is-invalid @enderror" id="categoria" name="categoria" >
                            @error('categoria')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen:</label>
                            <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                            @error('imagen')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="proveedor" class="form-label">Proveedor:</label>
                            <select name="proveedor">
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
