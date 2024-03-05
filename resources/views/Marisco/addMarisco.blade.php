<!-- Vista que llama al partial -->
@extends('layouts.landing')

@section('title', 'Añadir Marisco')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Agregar Marisco</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gestionAddMarisco') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="creador" id="creador" value="{{ auth()->id() }}">

                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" id="nombre" name="nombre" >
                                @error('nombre')
                                    <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4" value="{{old('nombre')}}"></textarea>
                            @error('descripcion')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="origen" class="form-label">Origen:</label>
                            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('origen')}}" id="origen" name="origen" >
                            @error('origen')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="precioKG" class="form-label">Precio por KG:</label>
                            <input type="number" class="form-control @error('precioKG') is-invalid @enderror" value="{{old('precioKG')}}" id="precioKG" name="precioKG" step="0.01" >
                            @error('precioKG')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control @error('cantidad') is-invalid @enderror" value="{{old('cantidad')}}" id="cantidad" name="cantidad" >
                            @error('cantidad')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fechaCompra" class="form-label">Fecha de Compra:</label>
                            <input type="date" class="form-control @error('fechaCompra') is-invalid @enderror" value="{{old('fechaCompra')}}" id="fechaCompra" name="fechaCompra" >
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
                            <div class="mb-3 form-check">
                                <label class="form-check-label" for="cocido">Cocido</label>
                                <input type="checkbox" class="form-check-input" id="cocido" name="cocido">
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen:</label>
                                <input type="file" class="form-control @error('imagen') is-invalid @enderror" value="{{old('imagen')}}" id="imagen" name="imagen">
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

