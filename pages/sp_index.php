<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticias.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/noticias-recomended.css">
      <!--<link  rel="stylesheet" href="/serflix/assets/css/components/noticias-style2.css">-->
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body>
  <?php include_once 'componentes/menu.php';?>
  <!-- Mnesjae principal de la pagina h1 -->
  <?php if($configuracion->mensajePrincipal){ include_once 'componentes/content-home.php'; }?>

  <!--Sección de noticias estilo tipo 1-->
  <div class="container">
    <div class="row">
      <div class="col-8">
          <?php include_once 'componentes/noticias-style1.php'; ?>
      </div>
      <div class="col-4">
         <?php include_once 'componentes/noticias-recomended.php'; ?>
      </div>
    </div>
  </div>

  <!--
  <div class="container">
    <div class="row">
       <div class="col-8">
           <?php include_once 'componentes/noticias-style2.php'; ?>
       </div>
    </div>
  </div>-->



  <?php include_once 'componentes/footer.php';?>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
  <script type="text/javascript" src="/serflix/assets/js/menu.js"></script>
</html>
