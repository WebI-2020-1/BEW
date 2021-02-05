<?php
    if(empty($_SESSION['dados_usuario'])){
        return redirect('/login', 'Sua seção foi encerrada. Efetue o login para continuar');
    }
?>