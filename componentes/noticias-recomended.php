<?php
  //Obtenemos toda la configuración de la noticia
  $noticia_recomended = json_decode(file_get_contents('assets/json/serflix/noticias-recomended.json'), false);
?>
<div class="column" id="recommended-news">
    <p class="title-section">
         <strong><?php echo $noticia_recomended->title; ?></strong>
    </p>
    <div class="post-thumbnail">
        <a href="#detalleFavoritos">
            <div class="container-imagen thumbnail-image">
                <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image thumbnail-image-detail"></div>
            </div>
            <div class="thumbnail-content">
               <div class="h-80-p text-justify">
                  <h2>La astronomia: una puerte estelar para apreciar el universo</h2>
               </div>
               <div class="h-20-p text-right">
                   <span class="thumbnail-text">
                        Leer más
                        <i class="fa-solid fa-right-long"></i>
                   </span>
               </div>
            </div>
        </a>
    </div>
    <div class="post-thumbnail">
        <a href="#detalleFavoritos">
            <div class="container-imagen thumbnail-image">
                <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image thumbnail-image-detail"></div>
            </div>
            <div class="thumbnail-content">
               <div class="h-80-p text-justify">
                  <h2>La astronomia: una puerte estelar para apreciar el universo</h2>
               </div>
               <div class="h-20-p text-right">
                   <span class="thumbnail-text">
                        Leer más
                        <i class="fa-solid fa-right-long"></i>
                   </span>
               </div>
            </div>
        </a>
    </div>
    <div class="post-thumbnail">
        <a href="#detalleFavoritos">
            <div class="container-imagen thumbnail-image">
                <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image thumbnail-image-detail"></div>
            </div>
            <div class="thumbnail-content">
               <div class="h-80-p text-justify">
                  <h2>La astronomia: una puerte estelar para apreciar el universo</h2>
               </div>
               <div class="h-20-p text-right">
                   <span class="thumbnail-text">
                        Leer más
                        <i class="fa-solid fa-right-long"></i>
                   </span>
               </div>
            </div>
        </a>
    </div>
    <div class="post-thumbnail">
        <a href="#detalleFavoritos">
            <div class="container-imagen thumbnail-image">
                <div style="background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');" class="image thumbnail-image-detail"></div>
            </div>
            <div class="thumbnail-content">
               <div class="h-80-p text-justify">
                  <h2>La astronomia: una puerte estelar para apreciar el universo</h2>
               </div>
               <div class="h-20-p text-right">
                   <span class="thumbnail-text">
                        Leer más
                        <i class="fa-solid fa-right-long"></i>
                   </span>
               </div>
            </div>
        </a>
    </div>
</div>