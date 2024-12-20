<?php
  $request = $_SERVER["REQUEST_URI"];
  //Quitamos las variables que puedan llegar por url
  $request_final = explode("?", $request);
  //Obtenemos toda la configuración de la noticia
  $acercaDeMi = json_decode(file_get_contents('assets/json' . $request_final[0] . '_' . $version . '.json'), false);
?>
<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <title><?php echo $acercaDeMi->title; ?></title>
      <link  rel="stylesheet" href=/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/privacity.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/breadcrums.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/cookies.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body>
      <?php include_once 'componentes/menu.php';?>
      <main class="container p-4">
        <article class="privacity">
          <div class="column">
            <ul class="breadcrums">
                <?php 
                    foreach ($acercaDeMi->breadcrumb as $breadcrumb => $valor) {
                        if(!empty($valor->link))
                           echo "<li><a href=\"{$valor->link}\">{$valor->name}</a></li>";
                        else
                           echo "<li><span>{$valor->name}</span></li>";
                    }
                ?>
            </ul>
            <h1><?php echo $acercaDeMi->h1; ?></h1>
            <div class="detail-privacy">
            <?php echo $acercaDeMi->texto; ?>
            </div>
          </div>
        </article>
      </main>
      <?php include_once 'componentes/cookies.php';?>
      <?php include_once 'componentes/footer.php';?>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
</html>