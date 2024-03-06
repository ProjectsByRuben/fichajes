<?php
include_once "..\scripts\conexion.php";
include ("../scripts/autentificado.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Horario - Centro Don Bosco</title>
    <style>
      .titulo{
        text-align: center;
      }
      .flecha{
        width: 50px;
        height: 50px;
      }
    </style>
  </head>
  <body>
		<div class="container">
			<br><br>			
      <div class="panel panel-primary">
        <h1 class="titulo">Horarios</h1>
      <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {

          $var_consulta= "select * from horarios";
          $var_resultado = $obj_conexion->query($var_consulta);

          if($var_resultado->num_rows>=0)
          {            
      ?>    
            <a href="../dashboard.php"><h1><img src="/img/flecha.png" class="flecha"></h1></a>
            <h3>Hay <?php echo "$var_resultado->num_rows"?> Horarios en la BBDD</h3>
            <table class="table caption-top">
            <thead>
            <tr><th scope="row">ID</th><th scope="row">Horario</th><th>Hº Entrada</th><th>Hº Salida</th><th>Plus</th></tr>
            </thead>
            <tbody>
            <form method="get" action=".\grabaHorario.php">
                <tr>
                  <td><input type="text" name="horario" size="7"></td>
                  <td><input type="text" name="nombre" size="7"></td>
                  <td><input type="text" name="entrada" size="30"></td>
                  <td><input type="text" name="salida" size="5"></td>
                  <td><input type="text" name="plus" size="5"></td>
                  <td><button type="submit" value="Añadir" class="btn btn-dark">Añadir</button></td><td></td>
                </tr>           
            </form>
            </tbody>
            
      <?php 
            while ($var_fila=$var_resultado->fetch_array())
            {
              echo("<tr><td>".$var_fila["id_horario"]."</td>");
              echo("<td>".$var_fila["nombre"]."</td>");
              echo("<td>".$var_fila["hora_entrada"]."</td>");
              echo("<td>".$var_fila["hora_salida"]."</td>");
              echo("<td>".$var_fila["plus"]."</td>");
      ?>        
              <td>
              <form method="get" action=".\modificaHorario.php">
                <input type='hidden' name='horario' value='<?php echo $var_fila["id_horario"]?>'>
                <input type='hidden' name='nombre' value='<?php echo $var_fila["nombre"]?>'>
                <input type='hidden' name='entrada' value='<?php echo $var_fila["hora_entrada"]?>'>
                <input type='hidden' name='salida' value='<?php echo $var_fila["hora_salida"]?>'>
                <input type='hidden' name='plus' value='<?php echo $var_fila["plus"]?>'>
                <button type="submit" class="btn btn-dark">Modificar</button>
              </form>
              </td>
              <td>
              <form method="get" action=".\confirmarBorrado.php">
                <input type='hidden' name='horario' value='<?php echo $var_fila["id_horario"]?>'>
                <input type='hidden' name='nombre' value='<?php echo $var_fila["nombre"]?>'>
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
              </td>
              </tr>

      <?php

            }
          }
          else
          {
            echo("<tr><td>");
            echo "No hay Registros en la BBDD</td>";
            echo("</td>");
          }
          $var_resultado->close();
	        $obj_conexion->close();
        }

      ?>
        </table>
      </div>
      <div class="text-center">&copy; Centro Don Bosco</div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>