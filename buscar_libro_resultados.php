<?php

$servidor = "localhost";
$usuario = "root";
$password = "password";
$bd = "BIBLIOTECA";

$conecta = mysqli_connect($servidor, $usuario, $password, $bd);

if ($conecta->connect_error) {
    die("Error al conectar con la base de datos: " . $conecta->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $consulta_SQL = "SELECT * FROM libros WHERE";

    if(isset($_GET['titulo']) && !empty($_GET['titulo'])){
        $titulo = $_GET['titulo'];
        $consulta_SQL .= " nombre LIKE '%$titulo%'";
    } else {
        
        if(isset($_GET['categoria']) && !empty($_GET['categoria'])){
            $categorias = $_GET['categoria'];

            $condiciones = array();
            foreach($categorias as $categoria){
                $condiciones[] = "genero = '$categoria'";
            }

            $consulta_SQL .= " " . implode(" OR ", $condiciones);
        } else {
            $consulta_SQL = "SELECT * FROM libros";
        }
    }

    $resultado = $conecta->query($consulta_SQL);

    if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
            echo "ID: " . $fila["id"]. " - Título: " . $fila["nombre"]. " - Autor: " . $fila["autor"]. " - Género: " . $fila["genero"]. "<br>";
        }
    } else {
        echo "No se encontraron resultados para la búsqueda.";
    }

    $conecta->close();
}

?>

