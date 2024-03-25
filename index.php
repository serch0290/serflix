<?php
    
    //Rutas definidas del proyecto
    $rutas = [
        '/serflix/' => ['Página principal', 'sp_index.php', ''],
        '/serflix/category/perros' => ['Mantenimiento', 'sp_mantenimiento.php', '/serflix-seo/category/#'],
        '/serflix/privacidad' => ['Privacidad', 'sp_privacidad.php'],
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
