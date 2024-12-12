<?php

$servidor = "localhost";
$usuario = "root";
$password = "password";
$bd = "BIBLIOTECA";

$conecta = mysqli_connect($servidor, $usuario, $password, $bd);

if ($conecta->connect_error) {
    die("Error al conectar base de datos" . $conecta->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Obtener los datos del formulario
    $nombre = $_GET['nombre'];
    $correo = $_GET['correo'];
    $libro = $_GET['libro'];
    $autor = $_GET['autor'];
    $id_libro = $_GET['id'];
    $fechaSolicitud = $_GET['fecha_solicitud'];
    $fechaEntrega = $_GET['fecha_entrega'];
    $tarifa_total = $_GET['tarifa_total'];

    $instruccion_SQL = "INSERT INTO solicitud (nombre, correo, libro, autor, id_libro, fechaSolicitud, fechaEntrega, tarifa_total) 
                        VALUES ('$nombre', '$correo', '$libro', '$autor', '$id_libro', '$fechaSolicitud', '$fechaEntrega', '$tarifa_total')";


    
    // Ejecutar la consulta SQL
    if ($conecta->query($instruccion_SQL) === TRUE) {
        echo "Solicitud realizada con éxito.";
    } else {
        echo "Error al procesar la solicitud: " . $conecta->error;
    }
    
    // Cerrar la conexión a la base de datos
    $conecta->close();
}
?>
