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
      <link  rel="stylesheet" href="/serflix/assets/css/dynamic.css">
      <link  rel="stylesheet" href="/serflix/assets/css/general.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/menu.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/privacity.css">
      <link  rel="stylesheet" href="/serflix/assets/css/components/breadcrums.css">
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
            <h1>Política de Privacidad</h1>
            <div class="detail-privacy">
                <p>El Titular le informa sobre su Política de Privacidad respecto del tratamiento y protección de los datos de carácter personal de los usuarios que puedan ser recabados durante la navegación a través del Sitio Web: http://arduinfo.xyz</p>
                <p>En este sentido, el Titular cumple con el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016 relativo a la protección de las personas físicas (RGPD).</p>
                <p>El uso de sitio Web implica la aceptación de esta Política de Privacidad así como las condiciones incluidas en el  Aviso Legal.</p>
                <h2>
                  Identidad del Responsable
                </h2>
                <ul>
                    <li><strong>Responsable:</strong> Sergio Cruz.</li>
                    <li><strong>Domicilio:</strong> Avenida José Larco 1232, Miraflores, Municipalidad Metropolitana de Lima - Perú.</li>
                    <li><strong>Correo electrónico:</strong> hola@arduinfo.xyz.</li>
                    <li><strong>Sitio Web:</strong> ejemplo.com.mx.</li>
                    <li><a href="#irDetalle">Política de Privacidad</a></li>
                </ul>
            </div>
          </div>
        </article>
      </main>
      <?php include_once 'componentes/footer.php';?>
      <?php include_once 'componentes/footer.php';?>
  </body>
  <script type="text/javascript" src="/serflix/assets/js/main.js"></script>
</html>