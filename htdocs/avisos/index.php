<?php
include_once "..\scripts\conexion.php";
include ("../scripts/autentificado.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Avisos - Centro Don Bosco</title>
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
      <h1 class="titulo">Avisos</h1>

      <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {

          $var_consulta= "SELECT 
                      a.id_aviso as id_aviso,
                      a.tipo as tipo,
                      a.comentario as comentario,
                      t.id_turno as id_turno
                  FROM aviso a
                  LEFT JOIN turnos_publicados t ON a.id_turno = t.id_turno";
          $var_resultado = $obj_conexion->query($var_consulta);

          if($var_resultado->num_rows>=0)
          {            
      ?>    
            <a href="../dashboard.php"><h1><img src="/img/flecha.png" class="flecha"></h1></a>
            <h3>Hay <?php echo "$var_resultado->num_rows"?> Avisos en la BBDD</h3>
            <table class="table caption-top">
            <thead>
            <tr><th>ID</th><th>Turno</th><th>Tipo</th><th>Comentario</th></tr>
            </thead>
            <tbody>
            <form method="get" action=".\grabaAviso.php">
                <tr>
                  <td><input type="text" name="aviso" size="10"></td>
                  <td>
                    <select name="turno">
                    <option value="">Turnos</option>
                    <?php
                      $query = $obj_conexion -> query ("SELECT * FROM turnos_publicados");
                      echo $query->num_rows."Turnos en la BBDD";
                    while ($valores=mysqli_fetch_array($query)){
                      $id=$valores["id_turno"];
                      echo '<option value="'.$id.'">'.$id.'</option>';
                    }
                    ?>
                    </select>
                  </td>
                  <td><input type="text" name="tipo" size="10"></td>
                  <td><input type="text" name="comentario" size="10"></td>
                  <td><button type="submit" value="Añadir" class="btn btn-dark"><span class="glyphicon glyphicon-plus"></span> Añadir</button></td><td></td>
                </tr>           
            </form>
            </tbody>
            
      <?php 
            while ($var_fila=$var_resultado->fetch_array())
            {
              echo("<tr><td>".$var_fila["id_aviso"]."</td>");
              echo("<td>".$var_fila["id_turno"]."</td>");
              echo("<td>".$var_fila["tipo"]."</td>");
              echo("<td>".$var_fila["comentario"]."</td>");
      ?>        
              <td>
              <form method="get" action=".\modificaAviso.php">
                <input type='hidden' name='aviso' value='<?php echo $var_fila["id_aviso"]?>'>
                <input type='hidden' name='turno' value='<?php echo $var_fila["id_turno"]?>'>
                <input type='hidden' name='tipo' value='<?php echo $var_fila["tipo"]?>'>
                <input type='hidden' name='comentario' value='<?php echo $var_fila["comentario"]?>'>
                <button type="submit" class="btn btn-dark">Modificar</button>
              </form>
              </td>
              <td>
              <form method="get" action=".\borraAviso.php">
                <input type='hidden' name='aviso' value='<?php echo $var_fila["id_aviso"]?>'>
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