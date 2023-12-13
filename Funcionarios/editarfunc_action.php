
<?php
include_once('../Conexao/conexao.php');
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

// NÃO ESQUECER QUE ESTÁ PÁGINA editarfunc_action TRABALHA EM ASSOCIAÇÃO A PÁGINA editarfunc.php
if($id && $nome && $email && $senha) {

    $sql = $conn->prepare("UPDATE  usuarios SET id = :id, nome = :nome,
    email = :email, senha = :senha
   
    WHERE id = :id");
    
    $sql->bindValue(':id', $id);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();
  
    header('Location: controlefunc.php');
    exit; // Serve para desligar o direcionamento

}else {
    
    header('Location: controlefunc.php');
    exit;
}
?>