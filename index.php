<?php
    
    //Rutas definidas del proyecto
    $rutas = [
        '/serflix/' => ['Página principal', 'sp_index.php', 'home'],
        '/serflix' => ['Página principal', 'sp_index.php', 'home'],
        '/serflix/principal' => ['Página principal', 'sp_index_principal.php', ''],
        '/serflix/perros/principal' => ['Mantenimiento', 'sp_category_principal.php'],
        '/serflix/perros' => ['Mantenimiento', 'sp_category.php'],
        '/serflix/perros/downsizing-formacion-de-galaxias-y-evolucion-estelar-cosmica' => ['Nota', 'sp_noticia.php', ''],
        '/serflix/privacidad' => ['Privacidad', 'sp_privacidad.php'],
        '/serflix/sobre-mi' => ['Acerca de mi', 'sp_about_me.php'],
        '/serflix/contacto' => ['Contacto', 'sp_contacto.php']
    ];

    //var_dump($_SERVER);Como estye puedo saber las variables del servidor
    
    $request = $_SERVER["REQUEST_URI"];
    //Quitamos las variables que puedan llegar por url
    $request_final = explode("?", $request);

    /**Validar si la pagina tiene paginacion y si exista esa apgian de paginacion*/
    if(str_contains($request_final[0], 'pagina')){
        
       $request_final_validation = explode('/pagina/',$request_final[0]);
        if($rutas[$request_final_validation[0]][2] == 'home'){
            $data = json_decode(file_get_contents('assets/json/home.json'), false);
        }else{

        }

        $paginationValidation = getPagination(get_object_vars($data));
        $totPages = (int)($paginationValidation->total / $paginationValidation->paginasMostrar);  
        /**Si es diferenye de cero quiere decir que se debe de agregar una pagina extra*/
        if(($paginationValidation->total % $paginationValidation->paginasMostrar) != 0) $totPages++;

        $prefixValidation = $paginationValidation->mask;
        $valuesValidation = explode("/", $prefixValidation);
        
        foreach ($valuesValidation as $key => $valor){
            if($valor == '#'){
              $posicionValorValidation = $key;
            }
        }

        $pageValidation = (int)explode("/",$request_final[0])[$posicionValorValidation];

        if($totPages < $pageValidation){
           include __DIR__. '/pages/' .'sp_no_found.php';
           return;
        }else{
            $request_final = $request_final_validation;
        }
    }

    /**Obtenemos el objeto pagination para ver su configuración */
    function getPagination($obj){
        foreach ($obj as $attribute) {
            if (is_object($attribute)){
                if(empty(get_object_vars($attribute)['pagination'])){
                   return getPagination(get_object_vars($attribute));
                }else{
                   return $attribute->pagination;
                }
            }
        }
    }

    if(str_contains($request_final[0], '/php/')){
       include __DIR__.'/assets/php/guardarComentario.php';
       return;
    }

    /**Configuración general del sitio */
    $configuracion = json_decode(file_get_contents('assets/json/configuracionGeneral.json'), false);

        // Verificar si hay página o no
    if(isset($rutas[$request_final[0]])) {
        // Incluir el PHP adecuado
        include __DIR__ . '/pages/' . $rutas[$request_final[0]][1];
    } else {
        // La página no existe
        http_response_code(404);
        include __DIR__ . '/pages/sp_error_404.php';
    }
?>
