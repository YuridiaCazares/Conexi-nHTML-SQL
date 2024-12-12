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
if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cumpleanios = $_POST['cumpleanios'];
        $correo = $_POST['correo'];
        $password_1 = $_POST['password_1'];

    $instruccion_SQL = "INSERT INTO registro (nombre, apellido, cumpleanos, correo, password_hash) 
    VALUES ('$nombre', '$apellido', '$cumpleanios', '$correo', '$password_1')";



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
