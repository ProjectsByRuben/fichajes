<?php
include_once "conexion.php";

echo "<h3></h3><hr><br>";

if (!$obj_conexion) {
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
} else {
    $nombre_usuario = $_REQUEST["usuario"];
    $contraseña = $_REQUEST["pass"];
    $hashed_password = hash('sha256', $contraseña);

    $var_consulta = "SELECT id_usuario, nombre, contraseña FROM usuarios WHERE nombre = ? AND contraseña = ? LIMIT 1";

    $stmt = $obj_conexion->prepare($var_consulta);

    if ($stmt) {
        $stmt->bind_param("ss", $nombre_usuario, $hashed_password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            session_start();
            $_SESSION["autentificado"] = "si";
            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Redirigir a otra página con un mensaje de error
            header("Location: error.php?mensaje=Nombre+de+usuario+o+contraseña+incorrectos");
            exit();
        }

        $stmt->close();
    } else {
        echo "<h3>Error en la preparación de la consulta.</h3>";
    }

    $obj_conexion->close();
}
?>
