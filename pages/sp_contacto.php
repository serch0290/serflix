<?php
  $request = $_SERVER["REQUEST_URI"];
  //Quitamos las variables que puedan llegar por url
  $request_final = explode("?", $request);
  //Obtenemos toda la configuración de la noticia
  $acercaDeMi = json_decode(file_get_contents('assets/json' . $request_final[0] . '.json'), false);
?>
<!doctype html>
<html lang="es"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
      <title><?php echo $acercaDeMi->title; ?></title>
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/contacto.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/breadcrums.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/footer.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/cookies.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" >
  </head>  
  <body>
      <?php include_once 'componentes/menu.php';?>
      <main class="container p-4">
         <article class="contacto">
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
                <h1>Contacto</h1>
                <p>Si tienes interés de escribirme por cualquier motivo, puedes usar el siguiente formulario:</p>
                <div class="detalle-formulario">
                    <form>
                       <div class="column">
                         <strong>Nombre: </strong>
                         <input type="text" id="name" name="Nombre" placeholder="Nombre" class="form-control"/>
                       </div>
                       <div class="column mt-20">
                         <strong>Correo Electrónico: </strong>
                         <input type="text" id="mail" name="email" placeholder="Correo Electrónico" class="form-control"/>
                       </div>
                       <div class="column mt-20">
                         <strong>Asunto: </strong>
                         <input type="text" id="asunto" name="asunto" placeholder="Asunto" class="form-control"/>
                       </div>
                       <div class="column mt-20">
                         <strong>Mensaje: </strong>
                         <textarea rows="10" id="comentario" class="form-control" placeholder="Comentario"></textarea>
                       </div>
                       <div class="column mt-20 align-end-items">
                         <button class="button-noticia" onclick="guardarContacto()">Enviar</button>
                       </div>
                    </form>
                </div>
            </div>
         </article>
      </main>
      <?php include_once 'componentes/cookies.php';?>
      <?php include_once 'componentes/footer.php';?>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
  <script type="text/javascript" src="/serflix/assets/js/comentarios.js"></script>
</html>