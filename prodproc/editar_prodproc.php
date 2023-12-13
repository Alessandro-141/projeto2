<?php
include_once('../Conexao/conexao.php');

// CUIDAR ESTAS INSTÂNCIAS DESTES "ID(S)".
$id = filter_input(INPUT_GET, 'id');
// Se tiver um "id" vai consultar o banco.
if($id) {
    $sql = $conn->prepare("SELECT * FROM produtos_processados WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    // Se deu certo vai voltar com um valor, vou verificar
    if($sql->rowCount() > 0){
        $produtos = $sql->fetch();
    }else{
    header('Location: controle_prodproc.php'); // Aqui preferi continuar na página controle para observar a operação sendo concluída.
    exit;
}

}else{
    header('Location: controle_prodproc.php'); // Aqui se algum ERRO ocorrer permanece na mesma página.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Editar produtos</title>
</head>
<body class="p-3 mb-2 bg-primary text-white">

<h1 class="edit">Editar produtos</h1>

<form method="POST" action="editar_prodproc_action.php">
<label>    
    Identificação do Produto:<input type="text" name="id" value="<?=$produtos['id'];?>"><br><br>
</label>   
<label>
    Categoria: <input class="rad" type="text" name="classificacao" value="<?=$produtos['classificacao'];?>"><br><br>
</label>   
<label>
    Quantidade: <input class="rad" type="text" name="quant" value="<?=$produtos['quant'];?>"><br><br>
</label>   
<label>
    Data de Entrada: <input class="rad" type="date" name="data_e" value="<?=$produtos['data_e'];?>"><br><br>
</label>   
<label>
    Data de Saída: <input class="rad" type="date" name="data_sa" value="<?=$produtos['data_sa'];?>"><br><br>
</label>   

 
<label>
    Validade Produto Fechado: <input  class="rad" type="text" name="val_sem_abert_emb" value="<?=$produtos['val_sem_abert_emb'];?>"><br><br>
</label>   
<label>
    Validade do Produto Aberto: <input class="rad" type="text" name="val_apos_abert" value="<?=$produtos['val_apos_abert'];?>"><br><br>
</label>   


<input class="rad" type="submit" value="Atualizar">

</form>

 
</body>
</html>
