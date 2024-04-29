<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    require_once('assets/php/lib/Conexion.php');

    $request = $_SERVER["REQUEST_URI"];
    //Quitamos las variables que puedan llegar por url
    $request_final = explode("?", $request);
    
    $home = json_decode(file_get_contents('assets/json/home.json'), false);
    $conexion = new Conexion();
    $conn = $conexion->connect();
    $conn->query("SET lc_time_names = 'es_ES'");
    $sql_noticias = "SELECT Ntcs_IDNoticia idNoticia, 
                            Ntcs_Titulo titulo, 
                            Ntcs_Descripcion descripcion, 
                            Ntcs_Url url, 
                            DATE_FORMAT(Ntcs_FchaCrcn, \"%d de %b del %Y\") fecha, 
                            Ctgr_Nombre categoria ,
                            (SELECT Imgn_Url 
                            FROM Srfl_Imagenes 
                            WHERE Imgn_IDNoticia = Ntcs_IDNoticia 
                            AND Imgn_IDResolucion = 1 AND Imgn_Estatus = 1) imagen,
                            IFNULL(Ntcs_TipoCtgr, 0) tipoNoticia
                     FROM Srfl_Noticias 
                     INNER JOIN Srfl_NtcsCtgr ON NtCt_IDNoticia = Ntcs_IDNoticia AND NtCt_Estatus = 1 
                     INNER JOIN Srfl_Categoria ON Ctgr_IDCategoria = NtCt_IDCategoria AND Ctgr_Estatus = 1 
                     WHERE Ntcs_Estatus = 1
                     AND Ntcs_EsttPblc = 2 ORDER BY Ntcs_IDNoticia DESC;";

    $resultNoticias = $conn->query($sql_noticias);
    $rowNoticias = mysqli_fetch_all($resultNoticias, MYSQLI_ASSOC);  
    $rowNoticiasCompleto = array_merge(array(), $rowNoticias);

    function filterNoticias($value){
         return (int)$value['tipoNoticia'] == 1;
    }

    function filterNoticiasTotal($value){
      return (int)$value['tipoNoticia'] == 0;
    }

    $noticiasPortada = array_values(array_filter($rowNoticiasCompleto, 'filterNoticias'));
    $rowNoticiasCompleto = array_values(array_filter($rowNoticiasCompleto, 'filterNoticiasTotal'));
    
?>
<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/about-us.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticias.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticias-recomended.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/portada.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/cookies.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body>
  <?php include_once 'componentes/menu.php';?>
  <!-- Mnesjae principal de la pagina h1 -->
  
  <!--Sección de noticias estilo tipo 1-->
  <div class="container container-xs">
    <?php include_once 'componentes/content-home.php'; ?>
    <div class="column">
       <?php include_once 'componentes/portada.php' ?>
    </div>  
    <div class="row-lx column">
       <div class="col-lx-8 col-12">
          <div class="mx-20 w-100-p mt-20">
             <?php include_once 'componentes/about-us.php' ?>
             <div class="mt-20">
               <?php include_once 'componentes/noticias-style1.php'; ?>
             </div>

          </div>  
       </div>
       <div class="col-lx-4 col-12">
          <?php include_once 'componentes/noticias-recomended.php'; ?>
       </div>
    </div>
  </div>
  
  <?php include_once 'componentes/footer.php';?>
  <?php include_once 'componentes/cookies.php';?>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
  <script type="text/javascript" src="/serflix/assets/js/menu.js"></script>
</html>
<?php 
    $conn->close();
?>
