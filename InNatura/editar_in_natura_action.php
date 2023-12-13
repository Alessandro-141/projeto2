<?php
include_once('../Conexao/conexao.php');
$id = filter_input(INPUT_POST, 'id');
$categoria_prod = filter_input(INPUT_POST, 'categoria_prod');
$qtde = filter_input(INPUT_POST, 'qtde');
$temp_max = filter_input(INPUT_POST, 'temp_max');
$data_entr = filter_input(INPUT_POST, 'data_entr');
$data_sai = filter_input(INPUT_POST, 'data_sai');
$val = filter_input(INPUT_POST, 'val');

if($id && $categoria_prod && $qtde && $temp_max && $data_entr  && $data_sai && $val  ) {

    $sql = $conn->prepare("UPDATE  produtos_in_natura SET categoria_prod = :categoria_prod,
    qtde = :qtde, temp_max = :temp_max, data_entr = :data_entr, data_sai = :data_sai, 
    val = :val
   
    WHERE id = :id");
    
    $sql->bindValue(':id', $id);
    $sql->bindValue(':categoria_prod', $categoria_prod);
    $sql->bindValue(':qtde', $qtde);
    $sql->bindValue(':temp_max', $temp_max);
    $sql->bindValue(':data_entr', $data_entr);
    $sql->bindValue(':data_sai', $data_sai);
    $sql->bindValue(':val', $val);

   
    $sql->execute();
  
    header('Location: controle_in_natura.php');
    exit; // Serve para desligar o direcionamento

}else {
    
    header('Location: controle_in_natura.php');
    exit;
}
?>