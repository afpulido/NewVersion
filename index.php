<?php
require_once "models/DataBase.php"; 
/* $prueba = Database::connection(); */
// Valida con la superglobal $_REQUEST que la variable 'c' no tenga ningún valor asignado por metodo get    
if(!isset($_REQUEST['c'])){
    //Se incluye y ejecuta el archivo Landing.php dentro de la carpeta controllers    
    require_once "controllers/Roles.php";
    // Se crea un objeto de la clase Landing y se ejecuta su metodo main()
    $controller = new Roles;
    $controller->deleteRoles();
}else{
    // si la variable 'c' tiene como valor una clase esta se le asigna a la variable global $controller
    $controller = $_REQUEST['c'];
    // se incluye y ejecuta el archivo concatenando el valor recibido por $controller
    require_once "controllers/".$controller .".php";
    // crea una instancia de la clase que se especifica en la variable $controller
    $controller = new $controller;
    // Valida que la variable 'a' tenga un valor si lo tiene lo busca y lo trae sino asigna main
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
    // llama la funcion y la usa con el dato capturado anteriormente
    call_user_func(array($controller,$action));
}


?>