<?php
  $request = $_SERVER["REQUEST_URI"];
  //Quitamos las variables que puedan llegar por url
  $request_final = explode("?", $request);
  //Obtenemos toda la configuración de la noticia
  $category = json_decode(file_get_contents('assets/json' . $request_final[0] . '.json'), false);
?>

<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticias-style2.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticias-group.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/ultimas-noticias-lateral.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/intereses.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/cookies.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/breadcrums.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body>
  <?php include_once 'componentes/menu.php';?>
  <div class="column">
      <!--Sección de noticias estilo tipo 1-->
      <div class="container container-xs">
         <!-- Mnesjae principal de la pagina h1 -->
         <?php if($configuracion->mensajePrincipal){ include_once 'componentes/content-home.php'; }?>

         <ul class="breadcrums">
            <?php 
               foreach ($category->breadcrumb as $breadcrumb => $valor) {
                  if(!empty($valor->link))
                     echo "<li><a href=\"{$valor->link}\">{$valor->name}</a></li>";
                  else
                     echo "<li><span>{$valor->name}</span></li>";
               }
            ?>
         </ul>
         
         <div class="row-xs wrap-xs column align-center-item-xs mt-10">
            <div class="col-lx-4 col-xs-6 col-12">
               <?php include 'componentes/noticias-group.php'; ?>
            </div>
            <div class="col-lx-4 col-xs-6 col-12">
               <?php include 'componentes/noticias-group.php'; ?>
            </div>
            <div class="col-lx-4 col-xs-6 col-12">
               <?php include 'componentes/noticias-group.php'; ?>
            </div>
         </div>
         
         <div class="row-lx column mt-20">
            <div class="col-lx-8">
               <?php include_once 'componentes/noticias-style2.php'; ?>
            </div>
            <div class="col-lx-4">
               <div class="w-100-p mx-20">
                  <?php include_once 'componentes/ultimas-noticias-lateral.php'; ?>
               </div>
               <div class="w-100-p mx-20">
                  <?php include_once 'componentes/intereses.php'; ?>
               </div>
            </div>
         </div>
    </div>

  </div>
  <?php include_once 'componentes/cookies.php';?>
  <?php include_once 'componentes/footer.php';?>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
  <script type="text/javascript" src="/serflix/assets/js/menu.js"></script>
</html>
