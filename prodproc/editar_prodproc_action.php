<?php
include_once('../Conexao/conexao.php');
$id = filter_input(INPUT_POST, 'id');
$classificacao = filter_input(INPUT_POST, 'classificacao');
$quant = filter_input(INPUT_POST, 'quant');
$data_e = filter_input(INPUT_POST, 'data_e');
$data_sa = filter_input(INPUT_POST, 'data_sa');
$val_sem_abert_emb = filter_input(INPUT_POST, 'val_sem_abert_emb');
$val_apos_abert = filter_input(INPUT_POST, 'val_apos_abert');


if($id && $classificacao && $quant && $data_e && $data_sa && $val_sem_abert_emb && $val_apos_abert ) {

    $sql = $conn->prepare("UPDATE  produtos_processados SET classificacao = :classificacao,
    quant = :quant, data_e = :data_e, data_sa = :data_sa, val_sem_abert_emb = :val_sem_abert_emb, val_apos_abert = :val_apos_abert
   
    WHERE id = :id");
    
    $sql->bindValue(':id', $id);
    $sql->bindValue(':classificacao', $classificacao);
    $sql->bindValue(':quant', $quant);
    $sql->bindValue(':data_e', $data_e);
    $sql->bindValue(':data_sa', $data_sa);
    $sql->bindValue(':val_sem_abert_emb', $val_sem_abert_emb);
    $sql->bindValue(':val_apos_abert', $val_apos_abert);
   
   
    $sql->execute();
  
    header('Location: controle_prodproc.php');
    exit; // Serve para desligar o direcionamento

}else {
    
    header('Location: controle_prodproc.php');
    exit;
}
?>