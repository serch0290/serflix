<?php
   ini_set('display_errors', '1');
   ini_set('display_startup_errors', '1');
   error_reporting(E_ALL);

   $dataConecction = json_decode(file_get_contents('assets/json/conexion.json'), false); 

   $conn = mysqli_connect($dataConecction->server, $dataConecction->username, $dataConecction->password, $dataConecction->database);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }

   $sql = "INSERT INTO Srfl_Comentarios(Cmnt_Nombre, Cmnt_Comentario, Cmnt_Email, Cmnt_EsttCmnt, Cmnt_FchaCrcn) VALUES ('".$_POST["name"]."','".$_POST["comment"]."', '".$_POST["email"]."', 1, CURDATE())";
    
   if ($conn->query($sql) === TRUE) {
       echo "Comentario guardado correctamente.";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
   //http://localhost/serflix/assets/php/guardarComentarios.php*/
?>