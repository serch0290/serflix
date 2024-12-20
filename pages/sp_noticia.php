<?php
  require_once('assets/php/lib/Conexion.php');
  $request = $_SERVER["REQUEST_URI"];
  //Quitamos las variables que puedan llegar por url
  $request_final = explode("?", $request);
  //Obtenemos toda la configuración de la noticia
  $noticia = json_decode(file_get_contents('assets/json' . $request_final[0] .'_'.$version. '.json'), false);

  $detalleNoticia = $noticia->detalle;

  $conexion = new Conexion();
  $conn = $conexion->connect();
  $conn->query("SET lc_time_names = 'es_ES'");
  $sql = "(SELECT Ntcs_IDNoticia idNoticia, 
                 Ntcs_Titulo titulo, 
                 Ntcs_Descripcion descripcion, 
                 Ntcs_Url url, 
                 DATE_FORMAT(Ntcs_FchaCrcn, \"%d de %b del %Y\") fecha, 
                 Ctgr_Nombre categoria ,
                 (SELECT Imgn_Url 
                  FROM Srfl_Imagenes 
                  WHERE Imgn_IDNoticia = Ntcs_IDNoticia 
                  AND Imgn_IDResolucion = 2 AND Imgn_Estatus = 1) imagen,
                  IFNULL(Ntcs_TipoCtgr, 0) tipoNoticia,
                  1 tipo
          FROM Srfl_Noticias 
          INNER JOIN Srfl_NtcsCtgr ON NtCt_IDNoticia = Ntcs_IDNoticia AND NtCt_Estatus = 1 
          INNER JOIN Srfl_Categoria ON Ctgr_IDCategoria = NtCt_IDCategoria AND Ctgr_Estatus = 1 
          WHERE Ntcs_Estatus = 1 AND NOT Ntcs_IDNoticia = ".$noticia->idNoticia."
          AND Ntcs_EsttPblc = 2 ORDER BY Ntcs_IDNoticia DESC LIMIT 0,5) UNION
          (SELECT Ntcs_IDNoticia idNoticia, 
                  Ntcs_Titulo titulo, 
                  Ntcs_Descripcion descripcion, 
                  Ntcs_Url url, 
                  DATE_FORMAT(Ntcs_FchaCrcn, \"%d de %b del %Y\") fecha, 
                  Ctgr_Nombre categoria ,
                  (SELECT Imgn_Url 
                   FROM Srfl_Imagenes 
                   WHERE Imgn_IDNoticia = Ntcs_IDNoticia 
                   AND Imgn_IDResolucion = 2 AND Imgn_Estatus = 1) imagen,
                   IFNULL(Ntcs_TipoCtgr, 0) tipoNoticia,
                  2 tipo
                  FROM Srfl_Noticias 
           INNER JOIN Srfl_NtcsCtgr ON NtCt_IDNoticia = Ntcs_IDNoticia AND NtCt_Estatus = 1 
           INNER JOIN Srfl_Categoria ON Ctgr_IDCategoria = NtCt_IDCategoria AND Ctgr_Estatus = 1 
           WHERE Ntcs_Estatus = 1 AND NOT Ntcs_IDNoticia = ".$noticia->idNoticia."
           AND Ntcs_EsttPblc = 2 AND Ntcs_IDNoticia IN (".$noticia->IDNoticiasEnlazado.")) UNION
           (SELECT Ntcs_IDNoticia idNoticia, 
                  Ntcs_Titulo titulo, 
                  Ntcs_Descripcion descripcion, 
                  Ntcs_Url url, 
                  DATE_FORMAT(Ntcs_FchaCrcn, \"%d de %b del %Y\") fecha, 
                  Ctgr_Nombre categoria ,
                  (SELECT Imgn_Url 
                   FROM Srfl_Imagenes 
                   WHERE Imgn_IDNoticia = Ntcs_IDNoticia 
                   AND Imgn_IDResolucion = 2 AND Imgn_Estatus = 1) imagen,
                   IFNULL(Ntcs_TipoCtgr, 0) tipoNoticia,
                  3 tipo
                  FROM Srfl_Noticias 
           INNER JOIN Srfl_NtcsCtgr ON NtCt_IDNoticia = Ntcs_IDNoticia AND NtCt_Estatus = 1 
           INNER JOIN Srfl_Categoria ON Ctgr_IDCategoria = NtCt_IDCategoria AND Ctgr_Estatus = 1 
           WHERE Ntcs_Estatus = 1 AND NOT Ntcs_IDNoticia = ".$noticia->idNoticia."
           AND Ntcs_EsttPblc = 2 AND Ntcs_IDNoticia IN (".$noticia->IDNoticiasRelacionadas."))";
  $resultNoticias = $conn->query($sql);
  $todasNoticias = mysqli_fetch_all($resultNoticias, MYSQLI_ASSOC);

  /**Filtramos por tipo las noticias */
  $noticiasRecientes = array_values(array_filter($todasNoticias, function($value){
    return (int)$value['tipo'] == 1;
  }));
 
 /**Filtramos por tipo las noticias */
  $noticiasEnlazado = array_values(array_filter($todasNoticias, function($value){
    return (int)$value['tipo'] == 2;
  }));

  /**Filtramos por tipo las noticias */
  $noticiasRelacionado = array_values(array_filter($todasNoticias, function($value){
    return (int)$value['tipo'] == 3;
  }));

  if(!empty($noticia->noticiasLateral)) $noticiasLateral = $noticia->noticiasLateral;
  if(!empty($noticia->redesSociales)) $redesSociales = $noticia->redesSociales;
?>
<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <link rel="icon" href="https://definanzas.top/wp-content/uploads/cropped-icono-definanzas-top-32x32.png"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <title><?php echo $noticia->title; ?></title>
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticia.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/intereses.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/ultimas-noticias-lateral.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/comentarios.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/cookies.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body onload="irDetalleNoticia();">
  <?php include_once 'componentes/menu.php';?>
  <main class="container p-4 container-xs">
    <div class="detail-note">
        <div class="column">
            <ul class="breadcrums">
                <?php 
                    foreach ($noticia->breadcrumb as $breadcrumb => $valor) {
                        if(!empty($valor->link))
                           echo "<li><a href=\"{$valor->link}\">{$valor->name}</a></li>";
                        else
                           echo "<li><span>{$valor->name}</span></li>";
                    }
                ?>
            </ul>
            <div class="row-lx column">
                <div class="col-lx-8">
                   <?php include_once 'componentes/detail-note.php';?>
                   <div class="intereses-mobile">
                      <?php include 'componentes/intereses.php'; ?>
                   </div>
                </div>
                <div class="col-lx-4 aside-noticias">
                   <aside class="w-100-p mx-40 noticias-lateral">
                   <div>
                        <?php include_once 'componentes/ultimas-noticias-lateral.php'; ?>
                    </div>
                  </aside>
                </div>
            </div><!--Fin del row--> 
        </div><!--Fin del column--> 
      </div><!--Fin de detail-note-->
  </main>
  <?php include_once 'componentes/cookies.php';?>
  <?php include_once 'componentes/footer.php';?>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
  <script type="text/javascript" src="/serflix/assets/js/noticia.js"></script>
  <script type="text/javascript" src="/serflix/assets/js/comentarios.js"></script>
</html>
<?php 
    $conn->close();
?>

