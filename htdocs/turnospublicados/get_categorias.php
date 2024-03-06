

<?php
/*require_once './con_db.php'; //libreria de conexion a la base*/
//echo "<tr><td>Hola caracola1</td></tr>"

include_once "..\scripts\conexion.php";
function conDb(){
    //echo "estoy en la funcion conDB";     
    $con = mysqli_connect('localhost', 'root', 'root', 'fichaje');
  
    if(!$con){
      print_r(mysqli_connect_error());
      return false;
    }else{
      $con->set_charset("utf8");
      return $con;
    }
  }
/*
function conDb(){
  $con = mysqli_connect('localhost', 'root', 'root', 'music');

  if(!$con){
    print_r(mysqli_connect_error());
    return false;
  }else{
    $con->set_charset("utf8");
    return $con;
  }
}
*/

//$banda_id = $_REQUEST("banda_id");
$id_departamento = filter_input(INPUT_POST, 'id_departamento'); //obtenemos el parametro que viene de ajax

if($id_departamento != ''){ //verificamos nuevamente que sea una opcion valida
  //echo "llamamos a la funcion conDB para conectarnos a la BBDD";
  $con = conDb();
  if(!$con){
    die("<br/>Sin conexi&oacute;n.");
  }

  /*Obtenemos los discos de la banda seleccionada*/
  $sql = "select id_categoria, nombre from categorias where id_departamento = ".$id_departamento;  
  //echo("<tr><td>");
  //echo "la consulta a la tabla discos es".$sql."</td>";
  //echo("</tr>");
  
  $query = mysqli_query($con, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
  mysqli_close($con);
}

/**
 * Como notaras vamos a generar código `html`, esto es lo que sera retornado a `ajax` para llenar 
 * el combo dependiente
 */
?>


<option value="">- Seleccione una categoria -</option>
<?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
<option value="<?= $op['id_categoria'] ?>"><?= $op['nombre'] ?></option>
<?php endforeach; ?>