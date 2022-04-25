<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Países</title>
</head>
<body>
    <center><h1>Países </h1></center>
    <table class="table table-striped">

        <!--encabezado-->
        <thead>
            <tr>
                <th>País</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Población</th>
                <th>Ciudades</th>
               
            </tr>
        </thead>
        <!--cuerpo-->
        <tbody>
            @foreach($paises as $pais => $infopais ){
                <tr>
                    <td>
                        {{ $pais }}
                    </td>
                    <td>
                        {{ $infopais["capital"] }}
                    </td>
                    <td>
                        {{ $infopais["modena"] }}
                    </td>
                    <td>
                        {{ $infopais["poblacion"] }}
                    </td>
                    <td>
                        {{ $infopais["ciudades"] }}
                    </td>
                </tr>

    }

            @endforeach
        </tbody>
        <!--pie de pagina-->
        <tfoot></tfoot>
    </table>

</body>
</html>