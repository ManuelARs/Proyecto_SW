<?php
    // header("HTTP/1.1 400 OK");
    // header("HTTP/1.1 500 OK");
    // header("HTTP/1.1 200 OK");
    // echo "Metodo HTTP:" . $_SERVER['REQUEST_METHOD'];

    include_once('funciones.php');

    header('Content-Type: application/json');

    $datos = file_get_contents("php://input");
    // echo "Request :". $_SERVER['REQUEST_METHOD']." ";
    switch ( $_SERVER['REQUEST_METHOD']) {
        case 'GET':
            //print("Consultar");
            if(isset($_GET["id"])!=null)
            {
                // echo "Entro Alumno";
                Alumno::consultarAlumno($_GET["id"]);
                // $response = array('message' => 'Data received successfully');
                // echo json_encode($response);
            }
            else
            {
                echo json_encode("Alumnos: ");
                Alumno::consultarAlumnos();
            }
            
            break;
        case 'POST':
            // print("Insertar");
            $_POST = json_decode($datos,true);

            echo "Alumno Registrado: ";
            // . json_encode($_POST);

            $alumno = new Alumno($_POST["id"],$_POST["nombre"],$_POST["apellido_p"],$_POST["apellido_m"],$_POST["grado"]);

            // echo $alumno;
            $alumno->guardarAlumno();

            break;
        case 'PUT':
            $_PUT = json_decode($datos, true);
            $alumno = new Alumno($_PUT["id"],$_PUT["nombre"],$_PUT["apellido_p"],$_PUT["apellido_m"],$_PUT["grado"]);
            // echo $alumno;
            echo "Registro actualizado";
            $alumno->actualizarAlumno($_PUT["id"]);
            break;
        case 'DELETE':
            // print("Eliminar");
            Alumno::eliminarAlumno($_GET["id"]);
            echo "Registro eliminado";
            break;
        
        default:
            # code...
            break;
    }
?>