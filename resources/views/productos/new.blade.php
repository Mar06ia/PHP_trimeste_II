@extends('layouts.menu')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@section('contenido')
<div class="row">
    <h1 class=" blue-text text-darken-3">nuevo producto:</h1>
</div>
<div class="row">
    <form action="{{ route('productos.store') }}" class="col s8" 
                method="POST" 
                enctype="multipart/form-data">
            
                @csrf
        <div class="row">
                <div class="col s8 input-field">
                <i class="material-icons">create</i>
                    <input type="text" id="nombre" name="nombre" placeholder="nombre de producto" class="validate">
                    <label for="nombre">Nombre del producto</label>
                </div>
            </div>
            <div class="row">
                <div class="col s8 input-field">
                <textarea name="description" id="description" class="materialize-textarea"></textarea>
                <label for="description">descripcion</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
            <input type="number" id="precio" name="precio" class="validate">
                <label for="precio">precio</label>
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
                
            </div>
            <div class="row">
                <div class="col s8 input-field">
                    <select name="marca" id="marca">
                        @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">
                            {{ $marca->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <label>Seleccione Marca</label>
                </div>
            </div>

            <div class="row">
                <div class="col s8 input-field">
                    <select name="categoria" id="categoria">
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <label>Seleccione Categoria</label>
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