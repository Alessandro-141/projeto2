<?php
include_once('../Conexao/conexao.php');
$id = filter_input(INPUT_POST, 'id');
$categoria = filter_input(INPUT_POST, 'categoria');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$data_ent = filter_input(INPUT_POST, 'data_ent');
$data_s = filter_input(INPUT_POST, 'data_s');
$armaz_temp_max = filter_input(INPUT_POST, 'armaz_temp_max');
$validade = filter_input(INPUT_POST, 'validade');


if($id && $categoria && $quantidade &&  $data_ent && $data_s && $armaz_temp_max && $validade ) {

    $sql = $conn->prepare("UPDATE  produtos_refrigerados SET categoria = :categoria,
    quantidade = :quantidade, data_ent = :data_ent, data_s = :data_s, armaz_temp_max = :armaz_temp_max, validade = :validade
   
    WHERE id = :id");
    
    $sql->bindValue(':id', $id);
    $sql->bindValue(':categoria', $categoria);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':data_ent', $data_ent);
    $sql->bindValue(':data_s', $data_s);
    $sql->bindValue(':armaz_temp_max', $armaz_temp_max);
    $sql->bindValue(':validade', $validade);
   
   
    $sql->execute();
  
    header('Location: controle_prodref.php');
    exit; // Serve para desligar o direcionamento

}else {
    
    header('Location: controle_prodref.php');
    exit;
}
?>