<?php
    $request = $_SERVER["REQUEST_URI"];
    //Quitamos las variables que puedan llegar por url
    $request_final = explode("?", $request);
    //Obtenemos toda la configuración de la noticia
    $noticia_style1 = json_decode(file_get_contents('assets/json/serflix/noticias-style1.json'), false);
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
       <a class="prev page-numbers">«</a>
       <strong class="page-numbers">1</strong>
       <a class="page-numbers" href="#VeADetalleNoticiaPage2">2</a>
       <a class="page-numbers">3</a>
       <a class="page-numbers">4</a>
       <a class="page-numbers">5</a>
       <a class="next page-numbers">»</a>
    </div>