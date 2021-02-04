<?php
    spl_autoload_register(
        function($class){
            if(file_exists("src/Controllers/".$class.".php")){
                require "src/Controllers/".$class.".php";
            }elseif(file_exists("src/Models/".$class.".php")){
                require "src/Models/".$class.".php";
            }elseif(file_exists("src/Views/".$class.".php")){
                require "src/Views/".$class.".php";
            }elseif(file_exists("src/database/".$class.".php")){
                require "src/database/".$class.".php";
            }
        }
    );
?>