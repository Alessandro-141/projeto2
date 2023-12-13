
<?php
session_start();
include_once('../Conexao/conexao.php');


$seguranca = isset($_SESSION['ativa']) ? TRUE : header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Painel Login</title>

    
</head>

<body>
<!-- Pensar numa lógica para usar esta $_session -->


<header>

              <h1 class="h1">Bem Vindo <?php echo $_SESSION['nome']; ?> </h1>
            
          </div>
          <p class="rest"><strong>Restaurante Doce sabor</strong></p>

<ul class="menu">
  <li><a href="#">Verifique a data por categoria</a>
  <ul>
                  <li><a href="../verifica_validade/controle_data_n.php">Produtos In Natura</a></li>
                  <li><a href="../verifica_validade/controle_data_p.php">Produtos Processados</a></li>
                  <li><a href="../verifica_validade/controle_data_r.php">Produtos Resfriados</a></li>
                  <li><a href="../verifica_validade/controle_data_v.php">Produtos à vácuo</a></li>
  </ul>
  </li>
  <li><a href="../parametros/total_tabelas.php">Listar todas as categorias</a></li>
      <li><a href="#">Menu tabelas</a>
          <ul>
                  <li><a href="../inNatura/controle_in_natura.php">Produtos In Natura</a></li>
                  <li><a href="../prodproc/controle_prodproc.php">Produtos Processados</a></li>
                  <li><a href="../prodref/controle_prodref.php">Produtos Resfriados</a></li>
                  <li><a href="../prodvacuo/controle_vacuo.php">Produtos à Vácuo</a></li>
                  <li><a href="../Funcionarios/controlefunc.php">Funcionários</a></li>
                  
                  
                  
                  
          </ul>
    </li>
  <li><a href="../parametros/pesquisar_por_nome.php">Pesquisar por nome</a></li>
  <li><a href="../Login/login.php">Sair</a></li>
</ul>




<div>

<img class="talheres" src="../IMG/restaurant2.png" alt="">
</div>

<div class="hero-text-box">
              <h2>Nossa missão é encantar seu paladar,<br>Aqui, cada prato é uma obra-prima.</h2>
              <a href="#">Comprar agora</a>
              <a href="#">Mais informações</a>
          </div>
</header>




<?php


?>



<?php  
 if(isset($_SESSION['ativa'])) { ?>
 
  



<?php 
}

 ?>


</body>
</html>

