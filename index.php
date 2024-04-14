<?php
    
    //Rutas definidas del proyecto
    $rutas = [
        '/serflix/' => ['Página principal', 'sp_index.php', ''],
        '/serflix/principal' => ['Página principal', 'sp_index_principal.php', ''],
        '/serflix/perros' => ['Mantenimiento', 'sp_category.php'],
        '/serflix/perros/downsizing-formacion-de-galaxias-y-evolucion-estelar-cosmica' => ['Nota', 'sp_noticia.php', ''],
        '/serflix/privacidad' => ['Privacidad', 'sp_privacidad.php'],
        '/serflix/sobre-mi' => ['Acerca de mi', 'sp_about_me.php'],
        '/serflix/contacto' => ['Contacto', 'sp_contacto.php'],
    ];

    //var_dump($_SERVER);Como estye puedo saber las variables del servidor
    
    $request = $_SERVER["REQUEST_URI"];
    //Quitamos las variables que puedan llegar por url
    $request_final = explode("?", $request);
    //$array_route = explode("/", ltrim($request_final[0], '/'));

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
