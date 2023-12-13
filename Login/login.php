

<?php
require_once "./function.php";
include_once ('../Conexao/conexao1.php');

if(isset($_POST['acessar'])) {
    login($connect);
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Formulario de acesso</title>
</head>
<nav>
<img id="prata" src="../img/prata.jpg" alt="">
<img id="temp" src="../img/temperatura3.png" alt="">
<legend id="pg">Quality Control</legend>

</nav>
<body id="campo">
   

    <form action="" method="POST">
        <fieldset>
            <legend id="pag">Acesso restrito, identifique-se</legend><br><br>
            <input class="email" type="email" name="email" placeholder="E-mail" required><br>
            <input class="senha" type="password" name="senha" placeholder="Senha" required><br><br>
            <input class="rosa" type="submit" name="acessar" value="Acessar">
        </fieldset>

    </form>
    
</body>
</html>