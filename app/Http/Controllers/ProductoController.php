<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
//dependencia para el validador
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar marcas y categorias de bd
        $marcas=Marca::all();
        $categorias=Categoria::all();
        //las enviamos a las vistas
        return view('productos.new') //
            ->with("marcas", $marcas)
            ->with("categorias", $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion de datos del formulario
        //1.Establecer las reglas de VALIDACION a aplicar
        //para la "input data"
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre', 
            "description" => 'required|min:10|max:45',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            "categoria" => 'required'

        ];

        //VALIDACION PERSONALIZADA
        $mensajes=[
            "required" => "Campo Obligatorio",
            "alpha" => "Solo letras",
            "numeric" => "Solo numeros",
            "image" => "Debe ser un archivo imagen",
            "min" => "minimo :min valor"

        ];

        //2.Crear el objeto validador
         //parametros que dato vamos a validar y bajo q reglas
        $v = Validator::make($request->all(), $reglas, $mensajes); 

        //3. validar
        //fails() retorna:
        //true: si la validacion falla
        //false: si la validacion es valida
        if($v->fails()){
            //validaccion incorrecta
            //llevando los errores a la vista new
            return redirect('productos/create')
                ->withErrors($v);

            //var_dump($v->errors());
        }else{
            //validacion correcta
                //crear un objeto UPLOADEDFILE
                $archivo = $request->imagen;

                //capturar nombre "original" del archivo
                $nombre_archivo =  $archivo->getClientOriginalName();
                var_dump($nombre_archivo);

                //mover archivo a carpeta public/img
                $ruta = public_path();
                $archivo->move("$ruta/img", $nombre_archivo);


                //registrar producto en la DB
                $producto =new Producto;
                $producto->nombre = $request->nombre;
                $producto->desc = $request->description;
                $producto->precio = $request->precio;
                $producto->imagen = $nombre_archivo;
                $producto->marca_id = $request->marca;
                $producto->categoria_id = $request->categoria;
                $producto->save();
                echo "producto registrado";
                //redireccionar al formulario 
                //llevando un mensaje
                return redirect('productos/create')
                    ->with("mensajito", "producto registrado");
        }
        
        //Acceder a los  datos del formulario para ser registrados a la db
        //Utilizando el objeto $request
        echo "<pre>";
        //acceder a la info del form
        //var_dump($request->nombre);
        echo "</pre>";


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
