<?php
include_once "../scripts/conexion.php";
include ("../scripts/autentificado.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <title>Categorias - Centro Don Bosco</title>
  </head>
  <body>


  <?php
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        } else {      

          // $var_consulta= "DELETE FROM socio WHERE socioID=".$_REQUEST["socioID"]; 

          $var_consulta=   $var_consulta = "UPDATE categorias SET "
          . "nombre='" . $_GET["categoria"]
          . "', sueldo_normal='" . $_GET["sueldo"]
          . "', sueldo_plus='" . $_GET["plus"]
          . "' WHERE id_categoria=" . $_GET["id_categoria"];

          //$var_resultado = $obj_conexion->query($var_consulta);
          echo $var_consulta."\n";
          
          $stmt = $obj_conexion->prepare($var_consulta);

          echo "<h3>Horario Modificado</h3>";
          $stmt->execute();
          $stmt->close();

        }
        
    ?>

    
    <br>
    <a href=".\index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Página principal</button>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>