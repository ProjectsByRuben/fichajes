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

    <title>Turnos - Centro Don Bosco</title>
  </head>
  <body>

  <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      $veces=$_REQUEST["veces"];
          $contador=0;
        
    
          /* ejemplo de una consulta */

          //$var_consulta= "SELECT * FROM socio WHERE socioID=".Integer.valueOf($_REQUEST["socioID"]); 
          

          //$var_resultado = $obj_conexion->query($var_consulta);
            
            while($contador<$veces){
              $insercion = "INSERT INTO turnos_publicados (id_turno, id_horario, id_departamento, id_categoria, fecha, hora_entrada_real, hora_salida_real) VALUES ('"
              . $_REQUEST["turno"]
              . "', '" . $_REQUEST["horario"]
              . "', '" . $_REQUEST["departamento"]
              . "', '" . $_REQUEST["categoria"]
              . "', '" . $_REQUEST["fecha"]
              . "', NULL, NULL)";
            $stmt = $obj_conexion->prepare($insercion);
            $stmt->execute();
            echo $insercion."\n";
            $contador++;
            }
          //echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
          

      ?>
              <table class="table table-striped">
              <tr><th>Horario</th><th>Departamento</th><th>Categoria</th><th>Fecha</th></tr>
      <?php
              echo "<td>".$_REQUEST["horario"]."</td>";
              echo "<td>".$_REQUEST["departamento"]."</td>";
              echo "<td>".$_REQUEST["categoria"]."</td>";
              echo "<td>".$_REQUEST["fecha"]."</td>";
              echo "</table>";
             
          $stmt->close();
          $obj_conexion->close();
           
      ?>
    
    <br>
    <a href=".\index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Página principal</button>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>