<?php
session_start();

if ($_SESSION["autentificado"] != "si") {
    // Si el usuario no está autenticado, redirigir a la página de inicio
    header("Location: ../index.php");
} else {
    // Obtener la fecha guardada en la sesión
    $fechaGuardada = $_SESSION["ultimoAcceso"];
    
    // Obtener la fecha y hora actuales
    $ahora = date("Y-n-j H:i:s");
    
    // Calcular el tiempo transcurrido desde la última actividad
    $tiempo_transcurrido = strtotime($ahora) - strtotime($fechaGuardada);

    // Comprobar si han pasado 10 minutos o más desde la última actividad
    if ($tiempo_transcurrido >= 120) {
        // Si han pasado 10 minutos o más, destruir la sesión y redirigir a la página de inicio
        session_destroy();
        header("Location: ../index.php");
    } else {
        // Si no ha pasado el tiempo límite, actualizar la fecha de la última actividad
        $_SESSION["ultimoAcceso"] = $ahora;
    }
}
?>
