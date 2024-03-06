<?php
include_once "conexion.php";
if(!$obj_conexion)
{
  echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else { 


$archivo = fopen("fichero.csv", "r"); // Abre el archivo en modo lectura

if ($archivo) {
    // Lee el archivo línea por línea
    while (($linea = fgets($archivo)) !== false) {
        // Divide la línea en campos usando el punto y coma como separador
        $campos = explode(";", $linea);

        // Procesa cada campo
        $i=1;
        $dni="";
        $fecha="";
        $entrada="";
        $salida="";
        foreach ($campos as $campo) {
            // Haz lo que necesites con cada campo
            if ($i==1) { 
                $dni=$campo;
            }
            if ($i==2) { 
                $fecha=$campo;
            }
            if ($i==3) { 
                $entrada=$campo;
            }
            if ($i==4) { 
                $salida=$campo;
            }
            $i++;
       
          // $var_consulta= "DELETE FROM socio WHERE socioID=".$_REQUEST["socioID"]; 
        }
        $var_consulta=     "UPDATE turnos_publicados SET "
        . "hora_entrada_real='" . $entrada . "', "
        . "hora_salida_real='" . $salida . "' "
        . "WHERE fecha='" . $fecha . "' and dni='" . $dni . "'";

          //$var_resultado = $obj_conexion->query($var_consulta);
          echo $var_consulta."\n";
          $stmt = $obj_conexion->prepare($var_consulta);
          $stmt->execute();

         
          
        // Agrega un salto de línea para separar las líneas (opcional)
    }
    
    
    fclose($archivo); // Cierra el archivo
} else {
    echo "No se pudo abrir el archivo.";
}
$stmt->close();
}
?>