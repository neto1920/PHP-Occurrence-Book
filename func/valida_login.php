<?php 
require_once("../conexao.php");

session_start();
$usuario_autenticado = false;

$stmt = $conn->prepare("SELECT ID, NOME, TIPO FROM usuario WHERE EMAIL= :email AND SENHA= :senha");
$stmt->execute(['email' => $_POST['email'], 'senha' => md5($_POST['senha'])]);
$resultado = $stmt->fetch();

if (isset($resultado['ID']) && $resultado['ID']) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['email']       = $_POST['email'];
    $_SESSION['tipo']        = $resultado['TIPO'];
    $_SESSION['idUser']      = $resultado['ID'];
    header('Location: ../home.php');       
} else {
    header('Location: ../index.php?login=errologin');
}
