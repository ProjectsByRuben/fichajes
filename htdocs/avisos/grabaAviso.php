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

    <title>Horarios - Centro Don Bosco</title>
  </head>
  <body>

  <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {
          //echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
        
    
          /* ejemplo de una consulta */

          //$var_consulta= "SELECT * FROM socio WHERE socioID=".Integer.valueOf($_REQUEST["socioID"]); 
          $var_consulta= "SELECT * FROM aviso WHERE id_aviso=".$_REQUEST["aviso"]; 

          //$var_resultado = $obj_conexion->query($var_consulta);
          echo $var_consulta."\n";

          $stmt = $obj_conexion->prepare($var_consulta);
          $stmt->execute();

          if($stmt->fetch())
          {
            echo "<h3>Lo siento, no se ha podido dar de alta, ya existe un socio con el número".$_REQUEST["horario"]."</h3>";
          }  else {
            $insercion = "INSERT INTO aviso VALUES ('".$_REQUEST["aviso"]
            . "', '" . $_REQUEST["turno"]
            . "', '" . $_REQUEST["tipo"]
            . "', '" . $_REQUEST["comentario"]."')";
            
            echo $insercion."\n";

            if ($stmt = $obj_conexion->prepare($insercion)) 
            {
              $stmt->execute();
              echo "<h3>Aviso dado de alta correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>ID Aviso</th><th>Tipo</th><th>Comentario</th></tr>
      <?php
              echo "<tr><td>".$_REQUEST["aviso"]."</td>";
              echo "<td>".$_REQUEST["tipo"]."</td>";
              echo "<td>".$_REQUEST["comentario"]."</td>";
              echo "</table>";
             
            } else {
              echo "ERROR al preparar el insert en la BBDD";
            }
          }
          $stmt->close();
          $obj_conexion->close();

        }
           
      ?>
    
    <br>
    <a href=".\index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Página principal</button>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>