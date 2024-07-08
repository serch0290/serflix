<div class="row-lx column">
    <div class="col-lx-6 col-12 mb-20-lt-lx">
        <article id="portada" class="article-principal">
          <?php 
          if(count($noticiasPortada) > 0){
             echo "<a href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$noticiasPortada[0]["url"]."\">
                        <div class=\"container-noticia\">
                            <div class=\"container-imagen content-image-principal\">
                                <img srcset=\"".$noticiasPortada[0]["imagen300"]." 300w, ".$noticiasPortada[0]["imagen"]." 1024w\" 
                                    sizes=\"(max-width: 600px) 300px,
                                            1024px\" class=\"image-src image-principal\" />
                                <div class=\"content-item-category\">
                                    <strong>".$noticiasPortada[0]["categoria"]."</strong>
                                </div>
                            </div>
                            <div class=\"content-principal align-center-items\">
                                <h2>".$noticiasPortada[0]["titulo"]."</h2>
                                <h3>".$noticiasPortada[0]["descripcion"]."</h3>
                                <h4>".$noticiasPortada[0]["fecha"]."</h4>
                            </div>
                        </div>
                </a>
                ";
          }else{
             echo "Sin información";
          }
          ?>
        </article>
    </div>
    <div class="col-lx-6 col-12">
       <div class="row wrap">
            <?php 
               for($i = 1; $i < 5; $i++){
                if(count($noticiasPortada) <= 1){
                    continue;
                 }
                /*if(strlen($noticiasPortada[$i]["titulo"]) > 26){
                   $titulo = substr($noticiasPortada[$i]["titulo"], 0, 26).' ...';
                }else{
                   $titulo = $noticiasPortada[$i]["titulo"];
                }
                */

                if(strlen($noticiasPortada[$i]["descripcion"]) > 50){
                   $descripcion = substr($noticiasPortada[$i]["descripcion"], 0, 50).' ...';
                }else{
                   $descripcion = $noticiasPortada[$i]["descripcion"];
                }
                
                echo "<div class=\"col-xs-6 col-12 ".(($i<= 2)? 'mb-10' : '')."\">
                         <article id=\"detalle-portada\" class=\"article-principal\">
                            <a href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$noticiasPortada[$i]["url"]."\">
                                <div class=\"container-noticia\">
                                    <div class=\"container-imagen image-thumb-image\">
                                        <div style=\"background-image: url('".$noticiasPortada[$i]["imagen"]."');\" class=\"image article-image-thumb\"></div>
                                        <div class=\"content-item-category\">
                                            <strong>".$noticiasPortada[$i]["categoria"]."</strong>
                                        </div>
                                    </div>
                                    <div class=\"article-content align-center-items\">
                                        <h2 class=\"title-article-content\">".$noticiasPortada[$i]["titulo"]."</h2>
                                        <h4 class=\"date-title\">".$descripcion."</h4>
                                        <h4>".$noticiasPortada[$i]["fecha"]."</h4>
                                    </div>
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