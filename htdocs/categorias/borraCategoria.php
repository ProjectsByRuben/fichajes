<?php
include_once "../scripts/conexion.php";
include ("../scripts/autentificado.php");

if(!$obj_conexion) {
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
} else {
    $var_consulta = "DELETE FROM categorias WHERE id_categoria='" . $_GET["id"] . "'"; 
    echo $var_consulta."\n";

    $stmt = $obj_conexion->prepare($var_consulta);
    $stmt->execute();
    $stmt->close();

    // Redirección a index.php
    echo "<script>window.location.href = 'index.php';</script>";
    exit; // Para asegurarse de que el script se detenga después de la redirección
}
?>
