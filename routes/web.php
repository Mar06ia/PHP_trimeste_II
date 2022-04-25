<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta en laravel
Route::get('hola' , function(){
    //imprimir en pantalla
    echo "hola";
 } );

 Route::get('arreglos' ,  function(){
    //Definir arreglo(asociativo) Indices y posiciones
    $estudiantes =["JUA"=>"Juana", "ANI"=>"Ana", "VALE"=> "Valeria","PAO"=> "Paola"];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    echo "<hr/>" ;

    //Agregar posicion
    $estudiantes[]=  "Cristian";
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";

    //Retirar elementos
    echo "<hr/>" ;
    unset($estudiantes["JUA"]);
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";


});

Route::get('Países', function(){
    $paises= [ "Colombia" => [
        "capital" => "Bogota",
        "modena" => "Peso",
        "poblacion" => 51.6,
        "ciudades" => ["Bogota", "Medellin", "Cali"]
    ], 

    "Peru" => [
        "capital" => "Lima",
        "modena" => "Sol",
        "poblacion" => 32.6,
        "ciudades" => ["Cusco", "Arequipa", "Puno"]
    ], 

    "Paraguay" => [
        "capital" => "Asuncion",
        "modena" => "Guarani",
        "poblacion" => 7.4,
        "ciudades" => ["Mar de Plata", "Rosario", "Salta" ]
    ],

    "Argentina" => [
        "capital" => "Buenos Aires",
        "modena" => "Peso Argentino",
        "poblacion" => 45.3,
        "ciudades" => ["Caupe", "Ciudad del Este"]
    ],

    "Brasil" => [
        "capital" => "Sao Paulo",
        "modena" => "Real",
        "poblacion" => 216.6,
        "ciudades" => ["Brasilia", "Fortaleza", "Recife"]
    ]


];
    
    /* echo "<pre>";
    var_dump($paises);
    echo "</pre>";*/

    /*
    foreach($paises as $pais => $infopais ){
        echo"<h1>$pais</h1>";
        //. se utiliza para concatenar
        foreach($infopais as $clave => $valor){
            echo "$clave : $valor <br/>";
            
        }
        echo "<hr />";
    }*/
    
    // Mostar vista de países
    return view('paises') 
          ->with("paises", $paises);

});