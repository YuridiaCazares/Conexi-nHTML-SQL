<?php

$servidor = "localhost";
$usuario = "root";
$password = "password";
$bd = "BIBLIOTECA";

$conecta = mysqli_connect($servidor, $usuario, $password, $bd);

if ($conecta->connect_error) {
    die("Error al conectar con la base de datos: " . $conecta->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_apellido = $_POST['nuevo_apellido'];
    $nuevo_cumpleanios = $_POST['nuevo_cumpleanios'];
    $nuevo_correo = $_POST['nuevo_correo'];
    $password_2 = $_POST['password_2'];

    $instruccion_SQL = "UPDATE registro 
    SET nombre = '$nuevo_nombre', 
        apellido = '$nuevo_apellido', 
        cumpleanos = '$nuevo_cumpleanios', 
        correo = '$nuevo_correo'  
    WHERE password_hash = '$password_2'";

    if ($conecta->query($instruccion_SQL) === TRUE) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conecta->error;
    }
}

$conecta->close();

?>
