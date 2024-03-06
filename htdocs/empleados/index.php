<?php
include_once "..\scripts\conexion.php";
include ("../scripts/autentificado.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Empleados - Centro Don Bosco</title>
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
      <h1 class="titulo">Empleados</h1>
      <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {          $var_consulta= "SELECT 
                      e.dni as dni,
                      e.nombre as empleado,
                      e.apellidos as apellidos,
                      e.iban as iban,
                      d.id_departamento as id_departamento,
                      d.nombre as departamento,
                      c.id_categoria as id_categoria,
                      c.nombre as categoria
                  FROM empleados e
                  LEFT JOIN departamentos d ON e.id_departamento = d.id_departamento
                  LEFT JOIN categorias c ON c.id_categoria = e.id_categoria";
          $var_resultado = $obj_conexion->query($var_consulta);

          if($var_resultado->num_rows>=0)
          {            
      ?>    
            <a href="../dashboard.php"><h1><img src="/img/flecha.png" class="flecha"></h1></a>
            <h3>Hay <?php echo "$var_resultado->num_rows"?> Empleados en la BBDD</h3>
            <table class="table caption-top">
            <thead>
            <tr><th>DNI</th><th>Departamento</th><th>Nombre</th><th>Categoria</th><th>Apellidos</th><th>IBAN</th></tr>
            </thead>
            <tbody>
            <form method="get" action=".\grabaEmpleado.php">
                <tr>
                  <td><input type="text" name="dni" size="7"></td>
                  <td>
                    <select name="departamento">
                    <option value="">Departamentos</option>
                    <?php
                      $query = $obj_conexion -> query ("SELECT * FROM departamentos");
                      echo $query->num_rows."departamentos en la BBDD";
                    while ($valores=mysqli_fetch_array($query)){
                      $id=$valores["id_departamento"];
                      $nombre=$valores["nombre"];
                      echo '<option value="'.$id.'">'.$nombre.'</option>';
                    }
                    ?>
                    </select>
                  </td>
                  <td><input type="text" name="empleado" size="8"></td>
                  <td>
                    <select name="categoria">
                    <option value="">Categorias</option>
                    <?php
                      $query = $obj_conexion -> query ("SELECT * FROM categorias");
                      echo $query->num_rows."categorias en la BBDD";
                    while ($valores=mysqli_fetch_array($query)){
                      $id=$valores["id_categoria"];
                      $nombre=$valores["nombre"];
                      echo '<option value="'.$id.'">'.$nombre.'</option>';
                    }
                    ?>
                    </select>
                  </td>   
                  <td><input type="text" name="apellidos" size="5"></td>
                  <td><input type="text" name="iban" size="5"></td>
                  <td><button type="submit" value="Añadir" class="btn btn-dark">Añadir</button></td><td></td>
                </tr>           
            </form>
            </tbody>
            
      <?php 
            while ($var_fila=$var_resultado->fetch_array())
            {
              echo("<tr><td>".$var_fila["dni"]."</td>");
              echo("<td>".$var_fila["departamento"]."</td>");
              echo("<td>".$var_fila["empleado"]."</td>");
              echo("<td>".$var_fila["categoria"]."</td>");
              echo("<td>".$var_fila["apellidos"]."</td>");
              echo("<td>".$var_fila["iban"]."</td>");
      ?>        
              <td>
              <form method="get" action=".\modificaEmpleado.php">
                <input type='hidden' name='dni' value='<?php echo $var_fila["dni"]?>'>
                <input type='hidden' name='departamento' value='<?php echo $var_fila["departamento"]?>'>
                <input type='hidden' name='id_departamento' value='<?php echo $var_fila["id_departamento"]?>'>
                <input type='hidden' name='empleado' value='<?php echo $var_fila["empleado"]?>'>
                <input type='hidden' name='categoria' value='<?php echo $var_fila["categoria"]?>'>
                <input type='hidden' name='id_categoria' value='<?php echo $var_fila["id_categoria"]?>'>
                <input type='hidden' name='apellidos' value='<?php echo $var_fila["apellidos"]?>'>
                <input type='hidden' name='iban' value='<?php echo $var_fila["iban"]?>'>
                <button type="submit" class="btn btn-dark">Modificar</button>
              </form>
              </td>
              <td>
              <form method="get" action=".\confirmarBorrado.php">
                <input type='hidden' name='dni' value='<?php echo $var_fila["dni"]?>'>
                <input type='hidden' name='empleado' value='<?php echo $var_fila["empleado"]?>'>
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