<div class="row-lx column">
    <div class="col-lx-6 col-12 mb-20-lt-lg">
        <article id="portada" class="article-principal">
          <?php 
            echo "<a class=\"container-noticia\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$noticiasPortada[0]["url"]."\">
                    <div class=\"container-imagen content-image-principal\">
                        <div style=\"background-image: url('".$noticiasPortada[0]["imagen"]."');\" class=\"image image-principal\"></div>
                        <div class=\"content-item-category\">
                            <strong>".$noticiasPortada[0]["categoria"]."</strong>
                        </div>
                    </div>
                    <div class=\"content-principal\">
                        <h2>".$noticiasPortada[0]["titulo"]."</h2>
                        <h3>".$noticiasPortada[0]["descripcion"]."</h3>
                        <h4>".$noticiasPortada[0]["fecha"]."</h4>
                    </div>
               </a>
            ";
          ?>
        </article>
    </div>
    <div class="col-lx-6 col-12">
       <div class="row wrap">
            <?php 
               for($i = 1; $i < 5; $i++){
                if(strlen($noticiasPortada[$i]["titulo"]) > 26){
                   $titulo = substr($noticiasPortada[$i]["titulo"], 0, 26).' ...';
                }else{
                   $titulo = $noticiasPortada[$i]["titulo"];
                }

                if(strlen($noticiasPortada[$i]["descripcion"]) > 50){
                   $descripcion = substr($noticiasPortada[$i]["descripcion"], 0, 50).' ...';
                }else{
                   $descripcion = $noticiasPortada[$i]["descripcion"];
                }
                
                echo "<div class=\"col-xs-6 col-12 mb-20-lt-lg\">
                         <article id=\"detalle-portada\" class=\"article-principal\">
                            <a class=\"container-noticia\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$noticiasPortada[$i]["url"]."\">
                                <div class=\"container-imagen image-thumb-image\">
                                    <div style=\"background-image: url('https://mascotasadorables.top/wp-content/uploads/2023/08/52-400x267.jpg.webp');\" class=\"image article-image-thumb\"></div>
                                    <div class=\"content-item-category\">
                                        <strong>".$noticiasPortada[$i]["categoria"]."</strong>
                                    </div>
                                </div>
                                <div class=\"article-content\">
                                    <h2 class=\"title-article-content\">".$titulo."</h2>
                                    <h4 class=\"date-title\">".$descripcion."</h4>
                                    <h4>".$noticiasPortada[$i]["fecha"]."</h4>
                                </div>
                            </a>
                        </article>
                    </div>
                ";
               }
            ?>
       </div>
    </div>
</div>