<?php
include_once "..\scripts\conexion.php";
include ("../scripts/autentificado.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Categorias - Centro Don Bosco</title>
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
      <h1 class="titulo">Categorias</h1>

      <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {
          $var_consulta= "SELECT 
                      c.id_categoria as id_categoria,
                      c.nombre as categoria,
                      c.sueldo_normal,
                      c.sueldo_plus,
                      d.id_departamento as id_departamento,
                      d.nombre as departamento
                  FROM categorias c
                  LEFT JOIN departamentos d ON d.id_departamento = c.id_departamento";
          $var_resultado = $obj_conexion->query($var_consulta);

          if($var_resultado->num_rows>=0)
          {            
      ?>    
            <a href="../dashboard.php"><h1><img src="/img/flecha.png" class="flecha"></h1></a>
            <h3>Hay <?php echo "$var_resultado->num_rows"?> Categorias en la BBDD</h3>
            <table class="table caption-top">
            <thead>
            <tr><th>ID</th><th>Departamento</th><th>Categoria</th><th>Salario Normal</th><th>Salario Plus</th></tr>
            </thead>
            <tbody>
            <form method="get" action=".\grabaCategoria.php">
                <tr>
                  <td><input type="text" name="id_categoria" size="7"></td>
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
                  <td><input type="text" name="categoria" size="5"></td>
                  <td><input type="text" name="sueldo" size="5"></td>
                  <td><input type="text" name="plus" size="5"></td>
                  <td><button type="submit" value="Añadir" class="btn btn-dark">Añadir</button></td><td></td>
                </tr>           
            </form>
            </tbody>
            
      <?php 
            while ($var_fila=$var_resultado->fetch_array())
            {
              echo("<tr><td>".$var_fila["id_categoria"]."</td>");
              echo("<td>".$var_fila["departamento"]."</td>");
              echo("<td>".$var_fila["categoria"]."</td>");
              echo("<td>".$var_fila["sueldo_normal"]."</td>");
              echo("<td>".$var_fila["sueldo_plus"]."</td>");
      ?>        
              <td>
              <form method="get" action=".\modificaCategoria.php">
                <input type='hidden' name='id_categoria' value='<?php echo $var_fila["id_categoria"]?>'>
                <input type='hidden' name='departamento' value='<?php echo $var_fila["departamento"]?>'>
                <input type='hidden' name='categoria' value='<?php echo $var_fila["categoria"]?>'>
                <input type='hidden' name='sueldo' value='<?php echo $var_fila["sueldo_normal"]?>'>
                <input type='hidden' name='plus' value='<?php echo $var_fila["sueldo_plus"]?>'>
                <button type="submit" class="btn btn-dark">Modificar</button>
              </form>
              </td>
              <td>
              <form method="get" action=".\confirmarBorrado.php">
                <input type='hidden' name='id_categoria' value='<?php echo $var_fila["id_categoria"]?>'>
                <input type='hidden' name='categoria' value='<?php echo $var_fila["categoria"]?>'>
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