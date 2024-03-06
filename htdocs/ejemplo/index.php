<?php
include_once "..\scripts\conexion.php";
include ("../scripts/autentificado.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   <?php
   if(!$obj_conexion)
   {
     echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
   }
   else{
    $var_consulta= "select * from horarios";
    $var_resultado = $obj_conexion->query($var_consulta);
    ?>
    <table class="table table-striped">
    <tr><th>ID</th><th>Horario</th><th>Hº Entrada</th><th>Hº Salida</th></tr>
    <form method="get" action=".\form.php">
        <tr>
            <td><input type="text" name="horario" size="10"></td>
            <td><input type="text" name="nombre" size="10"></td>
            <td><input type="text" name="entrada" size="10"></td>
            <td><input type="text" name="salida" size="10"></td>
            <td><input type="text" name="plus" size="10">
            <button type="submit" value="Añadir" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Añadir</button></td>
        </tr>   
   </form>
    <?php
    while ($var_fila=$var_resultado->fetch_array())
    {
        echo("<tr><td>".$var_fila["id_horario"]."</td>");
        echo("<td>".$var_fila["nombre"]."</td>");
        echo("<td>".$var_fila["hora_entrada"]."</td>");
        echo("<td>".$var_fila["hora_salida"]."</td>");
        echo("<td>".$var_fila["plus"]."</td>");
    }
   }
   ?>
    </table>
</body>
</html>