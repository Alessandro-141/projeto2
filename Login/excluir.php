<?php

include_once('conexao.php');

// A lógica aqui é capturar o "id" que vem do index.php ao clicar em excluir.
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

if($id) {
    $sql = $conn->prepare("DELETE FROM produtos WHERE id = :id");
    $sql->bindValue('id', $id);
    $sql->execute(); // Aqui vou fazer a execução.

    // E SE ocorreu tudo bem vou redirecionar a página.
    header('Location: controle.php');
    exit; // Serve para desligar o direcionamento
    
}
?>