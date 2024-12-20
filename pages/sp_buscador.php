<?php 
    require_once('assets/php/lib/Conexion.php');

    $request = $_SERVER["REQUEST_URI"];
    //Quitamos las variables que puedan llegar por url
    $request_final = explode("?", $request);

    $conexion = new Conexion();
    $conn = $conexion->connect();
    $conn->query("SET lc_time_names = 'es_ES'");
    $home = json_decode(file_get_contents('assets/json/busqueda.json'), false);

    $sql = "SELECT Ntcs_IDNoticia idNoticia, 
                   Ntcs_Titulo titulo, 
                   Ntcs_Descripcion descripcion, 
                   Ntcs_Url url, 
                   DATE_FORMAT(Ntcs_FchaCrcn, \"%d de %b del %Y\") fecha, 
                   Ctgr_Nombre categoria,
                   (SELECT Imgn_Url 
                    FROM Srfl_Imagenes 
                    WHERE Imgn_IDNoticia = Ntcs_IDNoticia 
                    AND Imgn_IDResolucion = 1 AND Imgn_Estatus = 1) imagen
            FROM Srfl_Noticias 
            INNER JOIN Srfl_NtcsCtgr ON NtCt_IDNoticia = Ntcs_IDNoticia AND NtCt_Estatus = 1 
            INNER JOIN Srfl_Categoria ON Ctgr_IDCategoria = NtCt_IDCategoria AND Ctgr_Estatus = 1 
            WHERE Ntcs_Estatus = 1 AND Ntcs_EsttPblc = 2 
              AND (Ntcs_Titulo COLLATE utf8mb4_general_ci LIKE \"%".$parametro."%\" OR Ntcs_Descripcion COLLATE utf8mb4_general_ci LIKE \"%".$parametro."%\")
            ORDER BY Ntcs_IDNoticia DESC;";
    
    $resBuscador = $conn->query($sql);
    $rowNoticiasCompleto = mysqli_fetch_all($resBuscador, MYSQLI_ASSOC);  

    if(count($rowNoticiasCompleto) < 6){
       $home->noticias_style1->pagination = false;
    }else{
       $home->noticias_style1->pagination->total = count($rowNoticiasCompleto);
       $totalNoticias = count($rowNoticiasCompleto);
    }

    /**Se valida si tiene paginación */
    if(!empty($isPagination)){
        $paginationValidation = $home->noticias_style1->pagination;
        include_once 'componentes/validationPagination.php';
        if($noFound){
           include __DIR__ .'/sp_no_found.php';
           return;
        }
     }
?>

<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticias.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/buscador.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/cookies.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body>
  <?php include_once 'componentes/menu.php';?>
  <div class="container">
    <div class="buscador-noticias">
      <p class="text-center font-size-22">Resultados de tú búsqueda: <strong><?php echo $_GET["b"];?></strong><p>
    </div>
    <div class="mt-20">
       <?php 
          if(count($rowNoticiasCompleto) > 0){
             include_once 'componentes/noticias-style1.php'; 
          }else{
            echo "<p>No se encontraron resultados.</p> 
                    <div class=\"mt-20\">";
                include_once 'componentes/noticias-interesantes.php';
            echo "</div>";
          }
         ?>
    </div>
  </div>
  <?php include_once 'componentes/cookies.php';?>
  <?php include_once 'componentes/footer.php';?>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
  <script type="text/javascript" src="/serflix/assets/js/menu.js"></script>
</html>
<?php 
    $conn->close();
?>
