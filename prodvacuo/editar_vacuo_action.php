<?php
include_once('../Conexao/conexao.php');
$id = filter_input(INPUT_POST, 'id');
$ident = filter_input(INPUT_POST, 'ident');
$quantia = filter_input(INPUT_POST, 'quantia');
$data_en = filter_input(INPUT_POST, 'data_en');
$data_saida = filter_input(INPUT_POST, 'data_saida');
$refrig = filter_input(INPUT_POST, 'refrig');
$cong = filter_input(INPUT_POST, 'cong');

if($id && $ident && $quantia && $data_en && $data_saida && $refrig  && $cong ) {

    $sql = $conn->prepare("UPDATE  produtos_vacuo SET ident = :ident, quantia = :quantia,
    data_en = :data_en, data_saida = :data_saida, refrig = :refrig, cong = :cong
   
    WHERE id = :id");
    
    $sql->bindValue(':id', $id);
    $sql->bindValue(':ident', $ident);
    $sql->bindValue(':quantia', $quantia);
    $sql->bindValue(':data_en', $data_en);
    $sql->bindValue(':data_saida', $data_saida);
    $sql->bindValue(':refrig', $refrig);
    $sql->bindValue(':cong', $cong);
   
    $sql->execute();
  
    header('Location: controle_vacuo.php');
    exit; // Serve para desligar o direcionamento

}else {
    
    header('Location: controle_vacuo.php');
    exit;
}
?>