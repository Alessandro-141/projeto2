<?php
include_once('../Conexao/conexao.php');


$id = filter_input(INPUT_GET, 'id');
// Se tiver um "id" vai consultar o banco.
if($id) {
    $sql = $conn->prepare("SELECT * FROM produtos_vacuo WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    // Se deu certo vai voltar com um valor, vou verificar
    if($sql->rowCount() > 0){
        $produtos = $sql->fetch();
    }else{
    header('Location: controle_vacuo.php'); // Aqui preferi continuar na página controle para observar a operação sendo concluída.
    exit;
}

}else{
    header('Location: controle_vacuo.php'); // Aqui se algum ERRO ocorrer permanece na mesma página.
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

<form method="POST" action="editar_vacuo_action.php">
<label>    
    Identificação do Produto:<input type="text" name="id" value="<?=$produtos['id'];?>"><br><br>
</label>
<label>
    Nome da Categoria: <input class="rad" type="text" name="ident" value="<?=$produtos['ident'];?>"><br><br>
</label>   
<label>
    Quantidade: <input class="rad" type="text" name="quantia" value="<?=$produtos['quantia'];?>"><br><br>
</label>   
<label>
    Data da Entrada: <input class="rad" type="date" name="data_en" value="<?=$produtos['data_en'];?>"><br><br>
</label>   

 
<label>
    Data de Saida: <input  class="rad" type="date" name="data_saida" value="<?=$produtos['data_saida'];?>"><br><br>
</label>   
<label>
    Produtos Refrigerados: <input class="rad" type="text" name="refrig" value="<?=$produtos['refrig'];?>"><br><br>
</label>   

<label>
    Produtos Congelados: <input class="rad" type="text" name="cong" value="<?=$produtos['cong'];?>"><br><br> 
</label>  
<input class="rad" type="submit" value="Atualizar">

</form>

 
</body>
</html>
