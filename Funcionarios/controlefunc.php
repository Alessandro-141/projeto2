


<?php
include_once('../Conexao/conexao.php');
$lista = [];
$sql = $conn->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0) {
    
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS_C/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Controle Funcionários</title>
</head>
<body class="p-3 mb-2 bg-primary text-white">



<h1>Controle de Funcionários</h1>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Nome do Funcionário</th>
        <th>Email</th>
        <!-- Está não precisa aparecer. <th>Senha</th> -->
        <th>Cadastrar</th>
        <th>Editar</th>
        <th>Excluir</th>
        
    </tr>
    <?php foreach($lista as $funcionarios):?>
        <tr>
        <td><?=$funcionarios['id'];?></td>
        <td><?=$funcionarios['nome'];?></td>
        <td><?=$funcionarios['email'];?></td>
        <!--<td><?//=$funcionarios['senha'];?></td>-->

        <td>

        <a href="cadastrarfunc.php?id=<?=$funcionarios['id'];?>">
        <img class="del" src="../IMG/checklist.png">

        </a>
        </td> 
      


        <td>
            <a href="editarfunc.php?id=<?=$funcionarios['id'];?>">
            <img class="del" src="../IMG/pen.png"></a>
        </td>    

        <td>
            <a class='trash3' href="excluirfunc.php?id=<?=$funcionarios['id'];?> ">
            <img class="del" src="../IMG/bin.png"></a>
        </td>

        
        </tr>

    <?php endforeach; ?>



</table>
<!-- Link para o painel central, após realizada a operação, tenho a opção de escolha para o painel central.-->
<div  class="btn3">
<a href="../Login/index.php">Voltar á página inicial</a>
</div>

</body>
</html>
    

