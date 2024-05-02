<?php 
   $aboutUs = json_decode(file_get_contents('assets/json/serflix/about-us.json'), false);
?>

<div class="column mb-40 about-us-general">
   <div class="w-100-p text-center">
      <?php 
        echo "<img src=\"".$aboutUs->img."\"/>";
      ?>
   </div>
   <p class="font-size-20 text-center">
      <strong>
         <?php echo $aboutUs->title; ?>
      </strong>
   </p>
   <p class="conten-about-us">
      <?php echo $aboutUs->descripcion; ?>
   </p>
   <div class="w-100-p text-center">
      <button class="button-noticia">Acerca de Nosotros</button>
   </div>
</div>