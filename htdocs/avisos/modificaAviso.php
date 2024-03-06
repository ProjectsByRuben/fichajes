<?php
include ("../scripts/autentificado.php");
?>
<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <title>Horarios - Centro Don Bosco</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <title>Modifica Aviso - Centro Don Bosco</title>
  </head>
  <body>
  <?php 
  //$_REQUEST.setCharacterEncoding("UTF-8"); 
  //echo $_REQUEST["socioID"];
  //$soc=$_REQUEST["socioID"];
  //echo $_REQUEST["nombre"];
  ?>
    <div class="container">
      <br><br>
      <div class="panel panel-info">
        <div class="panel-heading text-center">Modificación de Avisos</div>
          <form method="get" action=".\grabaAvisoModificado.php">
            <div class="form-group"> 
              <label>&nbsp;&nbsp;Aviso:&nbsp;</label><input type="text" size="7" name="aviso" value="<?php echo $_REQUEST["aviso"]; ?>" readonly>
            </div>
            <div class="form-group">
            <label>&nbsp;&nbsp;Turno:&nbsp;</label><input type="text" size="35" name="turno" value="<?php echo $_REQUEST["turno"]; ?>" readonly>
            </div>
            <div class="form-group">
             <label>&nbsp;&nbsp;Tipo:&nbsp;</label><input type="text" size="5" name="tipo" value="<?php echo $_REQUEST["tipo"]; ?>">
            </div>
            <div class="form-group">
             <label>&nbsp;&nbsp;Tipo:&nbsp;</label><input type="text" size="5" name="comentario" value="<?php echo $_REQUEST["comentario"]; ?>">
            </div>
            <hr>
            &nbsp;&nbsp;<a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Aceptar</button><br><br>
          </form>
      </div>
      <div class="text-center">&copy; Centro Don Bosco</div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>