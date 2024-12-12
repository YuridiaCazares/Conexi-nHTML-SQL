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
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $password_1 = $_POST['password_1'];

    // Consulta SQL para eliminar la cuenta
    $instruccion_SQL = "DELETE FROM registro 
                        WHERE correo ='$correo' AND password_hash = '$password_1'";

    // Ejecutar la consulta SQL
    if ($conecta->query($instruccion_SQL) === TRUE) {
        echo "Eliminación realizada con éxito.";
    } else {
        echo "Error al procesar la eliminación: " . $conecta->error;
    }

    // Cerrar la conexión a la base de datos
    $conecta->close();
}

?>
