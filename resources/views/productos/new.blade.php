@extends('layouts.menu')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@section('contenido')
@if(session('mensajito'))
<div class="row">
    <p>{{ session('mensajito')}}</p>
</div>
@endif
<div class="row">
    <h1 class=" indigo-text text- darken-4">Nuevo producto:</h1>
</div>
<div class="row">
    <form action="{{ route('productos.store') }}" class="col s8" 
                method="POST" 
                enctype="multipart/form-data">
            
                @csrf
        <div class="row">
                <div class="col s8 input-field">
                    <i class="material-icons">create
                        <input type="text" id="nombre" name="nombre" placeholder="nombre de producto" class="validate">
                        <label for="nombre">Nombre del producto</label>
                    </i>
                <!--mensaje de validacion ProductoController-->
                <strong>{{ $errors->first('nombre') }}</strong>
                </div>
            </div>
            <div class="row">
                <div class="col s8 input-field">
                <textarea name="description" id="description" class="materialize-textarea"></textarea>
                <label for="description">descripcion</label>
                <!--mensaje de validacion ProductoController-->
                <strong>{{ $errors->first('description') }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
            <input type="number" id="precio" name="precio" class="validate">
                <label for="precio">precio</label>
                <!--mensaje de validacion ProductoController-->
                <strong>{{ $errors->first('precio') }}</strong>
            </div>
            </div>
            <div class="row">
                <div class="col s8 file-field input-field">
                    <div class="btn">
                    <i class="material-icons">add_a_photo</i>
                        <span>imagenes del producto</span>
                        <input type="file" name="imagen">
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
            <!--mensaje de validacion ProductoController-->
            <strong>{{ $errors->first('imagen') }}</strong>    
            </div>
            <div class="row">
                <div class="col s8 input-field">
                    <select name="marca" id="marca">
                    <option value="">Seleccione Marca</option>
                        @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">
                            {{ $marca->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <label>Seleccione Marca</label>
                     <!--mensaje de validacion ProductoController-->
                    <strong>{{ $errors->first('marca') }}</strong> 
                </div>
            </div>

            <div class="row">
                <div class="col s8 input-field">
                    <select name="categoria" id="categoria">
                    <option value="">Seleccione Categoria</option>
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <label>Seleccione Categoria</label>
                     <!--mensaje de validacion ProductoController-->
                    <strong>{{ $errors->first('categoria') }}</strong> 
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" 
                    type="submit" name="action">Guardar Producto
                </button>
            </div>
        </div>
  </form>
</div>
@endsection