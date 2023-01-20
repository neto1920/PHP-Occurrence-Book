<?php
session_start();
require_once('../conexao.php');

$senha_atual   = $_POST['senha_atual'];
$nova_senha    = $_POST['nova_senha'];
$repetir_senha = $_POST['repetir_senha'];

$stmt = $conn->prepare("SELECT SENHA FROM usuario WHERE ID = :ID");
$stmt->execute(['ID' => $_SESSION['idUser']]);
$senha_banco = $stmt->fetchAll()[0];

// Verifica se senha atual é igual a senha do banco:
if (md5($senha_atual) != $senha_banco['SENHA']) {
    header('Location: ../trocarSenha.php?erro=1');
    die();
}

// Verifica se senha nova é igual a senha repetida:
if ($nova_senha != $repetir_senha) {
    header('Location: ../trocarSenha.php?erro=2');
    die();
}

$stmt = $conn->prepare("UPDATE usuario SET SENHA = :SENHA WHERE ID = :ID");
$stmt->execute(
    [
        'SENHA' => md5($nova_senha),
        'ID'    => $_SESSION['idUser']
    ]
);

header('Location: ../trocarSenha.php?success=1');
