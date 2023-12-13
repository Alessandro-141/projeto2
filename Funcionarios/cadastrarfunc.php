

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastrar Funcionários</title>
</head>
<body class="p-3 mb-2 bg-success text-white">

    <h1>Cadastrar Funcionários</h1>
    <?php
    // CRIEI UMA varável global que será utilizada no arquivo controle1.php, de onde farei a chamada desta $_SESSION['msg].
        $_SESSION['msg'] = "Funcionários Cadastrados com sucesso!";
        echo $_SESSION["msg"];
        
?>
    <!-- Neste action é onde vai ser guardado a regra de negocio para fazer as operações, que é poder cadastrar o produto-->
    <!-- Coloquei dentro de uma para poder aplicar o css -->
    <div class="d-flex flex-column bd-highlight mb-3">
    <form method="POST" action="cadastrofunc_action.php">
    
    <label>
        <input type="hidden" name="id"/><br><br>
    </label>
    <label >
        Nome : <input type="text" name="nome"/><br><br>
    </label>
    <label>
        Email: <input type="email" name="email"/><br><br>
    </label>
    <label>
        Senha: <input type="password" name="senha"/><br><br>
    </label>

    
    
    
    <input type="submit" value="Salvar"/>
    
    
    </form>
    </div>

    
    
</body>
</html>

