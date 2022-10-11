<?php 
    session_start();
    $usuario_autenticado = false;

    $usuario_teste = [
        ['email' => 'teste@teste.com', 'senha' => '123456']
    ];

    foreach ($usuario_teste as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
        }
    }
    if($usuario_autenticado){
        header('Location: ../home.php');
        $_SESSION['autenticado'] = 'SIM';
    }else {
        header('Location: ../index.php?login=errologin');
        $_SESSION['autenticado'] = 'NÃO';
    }
?>