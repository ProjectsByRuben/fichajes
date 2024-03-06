<?php
include_once "../scripts/conexion.php";
include ("../scripts/autentificado.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(!$obj_conexion)
{
  echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else{
    $var_consulta= "SELECT * FROM horarios WHERE id_horario=".$_REQUEST["horario"]; 
    echo $var_consulta."\n";

    $stmt = $obj_conexion->prepare($var_consulta);
    $stmt->execute();

    if($stmt->fetch())
          {
            echo "<h3>Lo siento, no se ha podido dar de alta, ya existe un socio con el número".$_REQUEST["horario"]."</h3>";
          }
    else {
    $insercion = "INSERT INTO horarios VALUES (".$_REQUEST["horario"]
                               . ", '" . $_REQUEST["nombre"]
                               . "', '" . $_REQUEST["entrada"]
                               . "', '" . $_REQUEST["salida"]
                               . "', '" . $_REQUEST["plus"]."')";

            echo $insercion."\n";

            if ($stmt = $obj_conexion->prepare($insercion)) 
            {
              $stmt->execute();
              echo "<h3>Socio dado de alta correctamente.</h3>";
?>

<?php
}
else {
    echo "ERROR al preparar el insert en la BBDD";
  }
}
$stmt->close();
$obj_conexion->close();
}
?>
</body>
</html>