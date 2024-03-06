<?php
include_once "..\scripts\conexion.php";
include ("../scripts/autentificado.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Departamentos - Centro Don Bosco</title>
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
      <h1 class="titulo">Departamentos</h1>
      <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {

          $var_consulta= "select * from departamentos";
          $var_resultado = $obj_conexion->query($var_consulta);

          if($var_resultado->num_rows>=0)
          {            
      ?>    
            <a href="../dashboard.php"><h1><img src="/img/flecha.png" class="flecha"></h1></a>
            <h3>Hay <?php echo "$var_resultado->num_rows"?> Departamentos en la BBDD</h3>
            <table class="table caption-top">
            <thead>
            <tr><th>ID</th><th>Departamento</th><th>Presupuesto Mensual</th></tr>
            </thead>
            <tbody>
            <form method="get" action=".\grabaDepartamento.php">
                <tr>
                  <td><input type="text" name="id_departamento" size="7"></td>
                  <td><input type="text" name="departamento" size="30"></td>
                  <td><input type="text" name="presupuesto" size="30"></td>
                  <td><button type="submit" value="Añadir" class="btn btn-dark">Añadir</button></td><td></td>
                </tr>           
            </form>
            </tbody>
            
      <?php 
            while ($var_fila=$var_resultado->fetch_array())
            {
              echo("<tr><td>".$var_fila["id_departamento"]."</td>");
              echo("<td>".$var_fila["nombre"]."</td>");
              echo("<td>".$var_fila["presupuesto_mensual"]."</td>");
      ?>        
              <td>
              <form method="get" action=".\modificaDepartamento.php">
                <input type='hidden' name='id_departamento' value='<?php echo $var_fila["id_departamento"]?>'>
                <input type='hidden' name='departamento' value='<?php echo $var_fila["nombre"]?>'>
                <input type='hidden' name='presupuesto' value='<?php echo $var_fila["presupuesto_mensual"]?>'>
                <button type="submit" class="btn btn-dark">Modificar</button>
              </form>
              </td>
              <td>
              <form method="get" action=".\confirmarBorrado.php">
                <input type='hidden' name='id_departamento' value='<?php echo $var_fila["id_departamento"]?>'>
                <input type='hidden' name='departamento' value='<?php echo $var_fila["nombre"]?>'>
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
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