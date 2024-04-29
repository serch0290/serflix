<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $request = $_SERVER["REQUEST_URI"];
    //Quitamos las variables que puedan llegar por url
    $request_final = explode("?", $request);
    //Obtenemos toda la configuración de la noticia
    $noticia_style1 = json_decode(file_get_contents('assets/json/serflix/noticias-style1.json'), false);


    $prefix = $noticia_style1->pagination->mask;
    $values = explode("/", $prefix);
    $posicionValor = 0;
    $page = 0;
    $limiteInferior = 0;
    $limiteSuperior = 0;
    $total_pages = (int)($noticia_style1->pagination->total / $noticia_style1->pagination->paginasMostrar);  

    /**Si es diferenye de cero quiere decir que se debe de agregar una pagina extra*/
    if(($noticia_style1->pagination->total % $noticia_style1->pagination->paginasMostrar) != 0) $total_pages++;
    foreach ($values as $key => $valor){
      if($valor == '#'){
         $posicionValor = $key;
      }
    }

    if (str_contains($request_final[0], $noticia_style1->pagination->name)) {
        $page = (int)explode("/",$request_final[0])[$posicionValor];//obtener el valos de la pagina en la url
    }else{
        $page = 1; //Si no tienen el prefijo quiere decir que estamos en la primera pagina
    }

    /* Obtenemos el limite inferior*/
    if(($page - 2) >= 1){
        $limiteInferior = ($page - 2);
    }else if(($page - 1) >= 1){
        $limiteInferior = ($page - 1);
    }else{
        $limiteInferior = $page;
    }

    /* Obtenemos el limite superior */
    if(($limiteInferior + 4) <= $total_pages){
        $limiteSuperior = ($limiteInferior + 4);
    }else{
      $limiteInferior = $total_pages - 4;
        $limiteSuperior = $total_pages;
    }
?>
<p class="title-section">
    <strong>
    <strong><?php echo $noticia_style1->title; ?></strong>
    </strong>
  </p>
  <div class="row wrap">
      <div class="col-sm-4 col-xs-6">
        <article class="article">
          <a class="container-noticia" href="#VeADetalleNoticia">
              <div class="container-imagen article-content-image">
                  <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image"></div>
                  <div class="content-item-category">
                    <strong>Perros</strong>
                  </div>
              </div>
              <div class="article-content">
                <h2 class="title-article-content">La astronomia: una puerte estelar para apreciar el universo</h2>
                <h4 class="date-title">01-Enero-2024</h4>
              </div>
          </a>
        </article>
      </div>
      <div class="col-sm-4 col-xs-6">
        <article class="article">
          <a class="container-noticia" href="#VeADetalleNoticia">
              <div class="container-imagen article-content-image">
                  <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image"></div>
                  <div class="content-item-category">
                    <strong>Perros</strong>
                  </div>
              </div>
              <div class="article-content">
                <h2 class="title-article-content">La astronomia: una puerte estelar para apreciar el universo</h2>
                <h4 class="date-title">01-Enero-2024</h4>
              </div>
          </a>
        </article>
      </div>
      <div class="col-sm-4 col-xs-6">
        <article class="article">
          <a class="container-noticia" href="#VeADetalleNoticia">
              <div class="container-imagen article-content-image">
                  <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image"></div>
                  <div class="content-item-category">
                    <strong>Perros</strong>
                  </div>
              </div>
              <div class="article-content">
                <h2 class="title-article-content">La astronomia: una puerte estelar para apreciar el universo</h2>
                <h4 class="date-title">01-Enero-2024</h4>
              </div>
          </a>
         </article>
      </div>
      <div class="col-sm-4 col-xs-6">
        <article class="article">
          <a class="container-noticia" href="#VeADetalleNoticia">
              <div class="container-imagen article-content-image">
                  <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image"></div>
                  <div class="content-item-category">
                    <strong>Perros</strong>
                  </div>
              </div>
              <div class="article-content">
                <h2 class="title-article-content">La astronomia: una puerte estelar para apreciar el universo</h2>
                <h4 class="date-title">01-Enero-2024</h4>
              </div>
          </a>
         </article>
      </div>
    </div>
    <div class="pagination">
       <?php 
        if($page >= 2) echo "<a class=\"prev page-numbers\" href=\"".$noticia_style1->pagination->dominio.$noticia_style1->pagination->prefix.($page-1)."\">«</a>";
        for($i = $limiteInferior; $i<= $limiteSuperior; $i++){
          if($i == $page){
             echo "<strong class=\"page-numbers\">".$i."</strong>";
          }else{
             echo "<a class=\"page-numbers\" href=\"". $noticia_style1->pagination->dominio .$noticia_style1->pagination->prefix.$i."\">".$i."</a>";
          }
        }
        if($page < $total_pages) echo "<a class=\"next page-numbers\" href=\"".$noticia_style1->pagination->dominio.$noticia_style1->pagination->prefix.($page+1)."\">»</a>";
       ?>
    </div>