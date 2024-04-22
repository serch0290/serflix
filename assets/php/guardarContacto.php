<?php
   ini_set('display_errors', '1');
   ini_set('display_startup_errors', '1');
   error_reporting(E_ALL);

   $conexion = new ConexionPDO();
   $con = $conexion->connect();

   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }

   $sql = "INSERT INTO Srfl_Contacto(Cntc_Nombre, Cntc_Asunto, Cntc_Descripcion, Cntc_Email, Cntc_FchaCrcn) VALUES ('".$_POST["name"]."','".$_POST["asunto"]."','".$_POST["comment"]."','".$_POST["email"]."', CURDATE())";
    
   if ($conn->query($sql) === TRUE) {
       echo "Contacto guardado correctamente.";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
?>