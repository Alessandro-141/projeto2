

<?php

include_once('../Conexao/conexao.php');

// A lógica aqui é capturar o "id" que vem do index.php ao clicar em excluir.
// Aqui está a lógica o do porque aparece na URL é o INPUT_GET o responsável.
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

if($id) {
    $sql = $conn->prepare("DELETE FROM  produtos_processados WHERE id = :id");
    $sql->bindValue('id', $id);
    $sql->execute(); // Aqui vou fazer a execução.

    // E SE ocorreu tudo bem vou redirecionar a página.
    //header('Location: controle.php'); // Original, comentei após quero observar se foi feita a operação, então permaneço na página 
    header('Location: controle_prodproc.php'); // AQUI É que eu consiga ver a operação sendo feita, está página é responsavel, então vou ser redireciona pra a mesma.
    exit; // Serve para desligar o direcionamento
    
}
?>