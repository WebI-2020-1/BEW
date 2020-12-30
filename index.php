<?php
    require_once('routes/app.php');
    $routes = new Routes($_GET['url']);

    // Função usada para debug
    function debug($param){
        echo json_encode($param);
    }
?>