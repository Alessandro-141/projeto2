<?php

include_once('../Conexao/conexao.php');

// A lógica aqui é capturar o "id" que vem do index.php ao clicar em excluir.
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

if($id) {
    $sql = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue('id', $id);
    $sql->execute(); // Aqui vou fazer a execução.

    // E SE ocorreu tudo bem vou redirecionar a página.
    //header('Location: index.php'); Original redirecionava, mas quero permanecer na mesma página e observar se a operação de exclusão ocorreu.

    
    header('Location: editarfunc.php'); // Tem que permanecer na página após a operação, para observar se foi concretizada.
    exit; // Serve para desligar o direcionamento
    
}
?>