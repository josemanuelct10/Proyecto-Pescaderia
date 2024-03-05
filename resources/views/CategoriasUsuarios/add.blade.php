<!-- Vista que llama al partial -->
@extends('layouts.landing')

@section('title', 'Añadir Categoria')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Agregar Categoria</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categorias.gestionAdd') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" >
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

