<?php
     ini_set('display_errors', '1');
     ini_set('display_startup_errors', '1');
     error_reporting(E_ALL);
     require_once('assets/php/lib/Conexion.php');

     $conexion = new Conexion();
     $conn = $conexion->connect();
     $conn->query("SET lc_time_names = 'es_ES'");
     $sql = "SELECT Ntcs_IDNoticia idNoticia,
                    Ntcs_Titulo titulo,
                    Ntcs_Descripcion descripcion,
                    Ntcs_Url url,
                    DATE_FORMAT(Ntcs_FchaCrcn, \"%d de %b del %Y\") fecha
              FROM Srfl_Noticias
              WHERE Ntcs_Estatus = 1  AND Ntcs_TipoCtgr = 1 AND Ntcs_EsttPblc = 2;";
  $result = $conn->query($sql);
  $row = mysqli_fetch_row($result);
?>

<div class="row-lx column">
    <div class="col-lx-6 col-12 mb-20-lt-lg">
        <article class="article-principal">
          <a class="container-noticia" href="#VeADetalleNoticia">
              <div class="container-imagen content-image-principal">
                  <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image image-principal"></div>
                  <div class="content-item-category">
                    <strong>Perros</strong>
                  </div>
              </div>
              <div class="content-principal">
                <h2>La astronomia: una puerte estelar para apreciar el universo</h2>
                <h3>Hey there! I’m Che Lewis, an avid Monty Python fan, lover of jokes and puns and someone who always tries to make others happy and smile!</h3>
                <h4>01 de Enero de 2024</h4>
              </div>
          </a>
        </article>
    </div>
    <div class="col-lx-6 col-12">
       <div class="row wrap">
          <div class="col-xs-6 col-12 mb-20-lt-lg">
            <article class="article-principal">
                <a class="container-noticia" href="#VeADetalleNoticia">
                    <div class="container-imagen image-thumb-image">
                        <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image-thumb"></div>
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
          <div class="col-xs-6 col-12 mb-20-lt-lg">
          <article class="article-principal">
                <a class="container-noticia" href="#VeADetalleNoticia">
                    <div class="container-imagen image-thumb-image">
                        <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image-thumb"></div>
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
          <div class="col-xs-6 col-12 mb-20-lt-lg">
          <article class="article-principal">
                <a class="container-noticia" href="#VeADetalleNoticia">
                    <div class="container-imagen image-thumb-image">
                        <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image-thumb"></div>
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
          <div class="col-xs-6 col-12 mb-20-lt-lg">
            <article class="article-principal">
                <a class="container-noticia" href="#VeADetalleNoticia">
                    <div class="container-imagen image-thumb-image">
                        <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image article-image-thumb"></div>
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
    </div>
</div>