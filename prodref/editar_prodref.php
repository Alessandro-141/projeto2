<?php
include_once('../Conexao/conexao.php');


$id = filter_input(INPUT_GET, 'id');
// Se tiver um "id" vai consultar o banco.
if($id) {
    $sql = $conn->prepare("SELECT * FROM produtos_refrigerados WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    // Se deu certo vai voltar com um valor, vou verificar
    if($sql->rowCount() > 0){
        $produtos = $sql->fetch();
    }else{
    header('Location: controle_prodref.php'); // Aqui preferi continuar na página controle para observar a operação sendo concluída.
    exit;
}

}else{
    header('Location: controle_prodref.php'); // Aqui se algum ERRO ocorrer permanece na mesma página.
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

<form method="POST" action="editar_prodref_action.php">
<label>    
    Identificação do Produto:<input type="text" name="id" value="<?=$produtos['id'];?>"><br><br>
</label>   

<label>
    Categorias: <input class="rad" type="text" name="categoria" value="<?=$produtos['categoria'];?>"><br><br>
</label>   
<label>
    Quantidade: <input class="rad" type="text" name="quantidade" value="<?=$produtos['quantidade'];?>"><br><br>
</label>   
<label>
    Data de Entrada: <input class="rad" type="date" name="data_ent" value="<?=$produtos['data_ent'];?>"><br><br>
</label>   
<label>
    Data de Saída <input class="rad" type="date" name="data_s" value="<?=$produtos['data_s'];?>"><br><br>
</label>   

 
<label>
    Temperatura de armazenamento: <input  class="rad" type="text" name="armaz_temp_max" value="<?=$produtos['armaz_temp_max'];?>"><br><br>
</label>   
<label>
    Validade do Produto: <input class="rad" type="text" name="validade" value="<?=$produtos['validade'];?>"><br><br>
</label>   


<input class="rad" type="submit" value="Atualizar">

</form>

 
</body>
</html>
