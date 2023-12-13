


<?php
include_once('../Conexao/conexao.php');

/* 
IMPORTANTE a lógica é se tiver um "id" vai procurar no banco de dados,
e após redireciona para a página controlefunc.php.
*/
$id = filter_input(INPUT_GET, 'id');
// Se tiver um "id" vai consultar o banco.
if($id) {
    $sql = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    // Se deu certo vai voltar com um valor, vou verificar
    if($sql->rowCount() > 0){
        $funcionarios = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
    header('Location: controlefunc.php'); // Após editado permanece na mesma página que é o correto.
    exit;
}

}else{
    header('Location: controlefunc.php'); // Aqui se ocorrer algum ERRO permanece na mesma página.
}
?>
<?php
/* NÃO ESQUECER QUE ESTÁ PÁGINA editarfunc.php TRABALHA EM ASSOCIAÇÃO A PÁGINA editarfunc_action e
com as outras PÁGINAS TAMBÉM.
*/ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Editar Funcionários</title>
</head>
<body class="p-3 mb-2 bg-primary text-white">

<h1 class="edit">Editar Funcionários</h1>
<!-- Aqui estou setando uma variável chamada $funcionarios que vai receber o chamamento no controlefunc.php -->
<form method="POST" action="editarfunc_action.php"> <!-- Aqui da sequência no processo que começa aqui, por isso redireciona para editarfunc_action.php-->
<label>
<input type="hidden" name="id" value="<?=$funcionarios['id'];?>"><br><br>
</label>   
<label>
    <!-- BEM INTERESSANTE está pagina é responsável por mostrar todas as operações do CRUD = 
as 4 operações de "listar = select, insert, update = atualização delete = excluir" 
ENTÃO APÓS REALIZAR A OPERAÇÃO -->
    Nome do Funcionário: <input class="rad" type="text" name="nome" value="<?=$funcionarios['nome'];?>"><br><br>
</label>   

<label>
    Email:    <input  class="rad" type="email" name="email" value="<?=$funcionarios['email'];?>"><br><br>
</label>   
<label>
    Senha: <input type="password" name="senha" value="<?=$funcionarios['senha'];?>"><br><br>
</label>   

<input class="rad" type="submit" value="Atualizar">

</form>

 
</body>
</html>
