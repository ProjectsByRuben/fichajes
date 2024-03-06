<?php
include_once "..\scripts\conexion.php";
include ("../scripts/autentificado.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Turnos - Centro Don Bosco</title>
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
      <h1 class="titulo">Turnos Publicados</h1>
      <?php
        echo "<h3></h3><hr><br>";
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {

          $var_consulta= "SELECT 
          t.dni as dni,
          t.id_turno as turno,
          t.fecha,
          t.hora_entrada_real,
          t.hora_salida_real,
          t.id_turno as id_turno,
          e.nombre as empleado,
          d.id_departamento as id_departamento,
          d.nombre as departamento,
          h.nombre as horario,
          h.plus as plus,
          c.id_categoria as id_categoria,
          c.nombre as categoria,
          c.sueldo_normal as sueldo_normal,
          c.sueldo_plus as sueldo_plus
      FROM turnos_publicados t
      LEFT JOIN empleados e ON e.dni = t.dni
      LEFT JOIN departamentos d ON t.id_departamento = d.id_departamento
      LEFT JOIN horarios h ON h.id_horario = t.id_horario
      LEFT JOIN categorias c ON c.id_categoria = t.id_categoria";
          $var_resultado = $obj_conexion->query($var_consulta);

          if($var_resultado->num_rows>=0)
          {            
      ?>    
            <a href="../dashboard.php"><h1><img src="/img/flecha.png" class="flecha"></h1></a>
            <h3>Hay <?php echo "$var_resultado->num_rows"?> Turnos en la BBDD</h3>
            <table class="table caption-top">
            <thead>
            <tr><th>ID</th><th>Horario</th><th>Usuario</th><th>Departamento</th><th>Categoria</th><th>Fecha</th><th>Entrada Real</th><th>Salida Real</th><th>Precio</th><th>Veces</th></tr>
            </thead>
            <tbody>
            <form method="get" action=".\grabaTurno.php">
                <tr>
                  <td><input type="text" name="turno" size="4" readonly></td>
                  <td>
                    <select name="horario">
                    <option value="">Horarios</option>
                    <?php
                      $query = $obj_conexion -> query ("SELECT * FROM horarios");
                      echo $query->num_rows."horarios en la BBDD";
                    while ($valores=mysqli_fetch_array($query)){
                      $id=$valores["id_horario"];
                      $nombre=$valores["nombre"];
                      echo '<option value="'.$id.'">'.$nombre.'</option>';
                    }
                    ?>
                    </select>
                  </td>
                  <td><input type="text" readonly size=4></td>
                  <td>
                    <select id="departamentos" name="departamento">
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
                  <td>
                    <select id="categorias" name="categoria" disabled="">
                    <option value="">- Seleccione -</option>
                    </select>
                  </td>
                  <td><input type="date" name="fecha" size="4"></td>
                  <td><input type="text" name="entrada" size="4" value="----------" readonly></td>
                  <td><input type="text" name="salida" size="4" value="----------" readonly></td>
                  <td><input type="text" name="sueldo" size="4"  value="----------" readonly></td>
                  <td><input type="text" name="veces" size="4"></td>
                  <td><button type="submit" value="Añadir" class="btn btn-dark">Añadir</button></td><td></td>
                </tr>           
            </form>
            </tbody>
            
      <?php 
            while ($var_fila=$var_resultado->fetch_array())
            {
              echo("<tr><td>".$var_fila["turno"]."</td>");
              echo("<td>".$var_fila["horario"]."</td>");
              echo("<td>".$var_fila["empleado"]."</td>");
              echo("<td>".$var_fila["departamento"]."</td>");
              echo("<td>".$var_fila["categoria"]."</td>");
              echo("<td>".$var_fila["fecha"]."</td>");
              echo("<td>".$var_fila["hora_entrada_real"]."</td>");
              echo("<td>".$var_fila["hora_salida_real"]."</td>");
              if($var_fila["plus"]==0){
                $sueldo_plus_multiplicado = $var_fila["sueldo_normal"] * 8;
                echo("<td>".$sueldo_plus_multiplicado."</td>");
              }
              else{
                $sueldo_plus_multiplicado = $var_fila["sueldo_plus"] * 8;
                echo("<td>".$sueldo_plus_multiplicado."</td>");
              }
      ?>
        
              <td>
              <form method="get" action=".\modificaTurno.php">
                <input type='hidden' name='turno' value='<?php echo $var_fila["id_turno"]?>'>
                <input type='hidden' name='categoria' value='<?php echo $var_fila["id_categoria"]?>'>
                <input type='hidden' name='departamento' value='<?php echo $var_fila["id_departamento"]?>'>
                <button type="submit" class="btn btn-dark">Modificar</button>
              </form>
              </td>
              <td>
              <form method="get" action=".\confirmarBorrado.php">
                <input type='hidden' name='turno' value='<?php echo $var_fila["id_turno"]?>'>
                <input type='hidden' name='fecha' value='<?php echo $var_fila["fecha"]?>'>
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
    <script> 
            $(document).ready(function(){
              var categorias = $('#categorias');
              
              
              //Ejecutar accion al cambiar de opcion en el select de las bandas
              $('#departamentos').change(function(){
                var id_departamento = $(this).val(); //obtener el id seleccionado

                if(id_departamento !== '') { //verificar haber seleccionado una opcion valida
                  //alert('Cambio de grupo detectado... llamamos al programa get_discos.php pasandole la banda seleccionada');

                  /*Inicio de llamada ajax*/
                  $.ajax({
                    data: {id_departamento:id_departamento}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                    dataType: 'html', //tipo de datos que esperamos de regreso
                    type: 'POST', //mandar variables como post o get
                    url: 'get_categorias.php' //url que recibe las variables
                  }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             
                    //alert('el pgm get_discos.php nos devuelve los discos asociados al grupo seleccionado y con ello rehacemos el contenido del elemento discos de tipo select'+data);
                     /* alert(data); */
                    categorias.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                    categorias.prop('disabled', false); //habilitar el select
                  });
                  /*fin de llamada ajax*/

                }else{ //en caso de seleccionar una opcion no valida
                   categorias.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
                   categorias.prop('disabled', true); //deshabilitar el select
                }     
              });


              //mostrar una leyenda con el disco seleccionado
            

            });
          </script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>