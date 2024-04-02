<?php
  $request = $_SERVER["REQUEST_URI"];
  //Quitamos las variables que puedan llegar por url
  $request_final = explode("?", $request);
  //Obtenemos toda la configuración de la noticia
  $noticia = json_decode(file_get_contents('assets/json' . $request_final[0] . '.json'), false);
?>
<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticia.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body onload="irDetalleNoticia();">
  <?php include_once 'componentes/menu.php';?>
  <main class="container p-4">
    <article class="detail-note">
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
            <div class="row">
                <div class="col-8">
                   <?php include_once 'componentes/detail-note.php';?>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div> 
    </article>
  </main>

  <?php include_once 'componentes/footer.php';?>
  </body>
  <script type="text/javascript" src="/serflix/assets/js/noticia.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
</html>
