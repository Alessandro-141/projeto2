<?php
session_start();
include_once('../Conexao/conexao.php');
$lista = [];
$sql = $conn->query("SELECT * FROM produtos_vacuo");
if($sql->rowCount() > 0) {
    
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    



}



?>
<?php
    // CRIEI UMA varável global que será utilizada no arquivo controle1.php, de onde farei a chamada desta $_SESSION['msg].
        $_SESSION['msg'] = "<p style='color:yellow;'>Verificando pela data de saída para evitar o desperdicio do produto!</p>";
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS_C/style.css">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Controle produtos</title>
</head>
<body id="temp1">


<h1>Controle de Produtos à Vácuo</h1>

<table class="table table-striped" class="table table-bordered tabele-hover" id="minhaTabela" >
<thead>
    <tr>
        <th>ID</th> 
        <th>Variedades</th>
        <th>Quantidade</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Alimentos Resfriados</th>
        <th>Alimentos Congelados</th>
        <!--<th>Cadastrar</th>-->
        <th>Editar</th>
        <th>Excluir</th>
        
    </tr>
</thead>
    <?php
    
    ?>
    <?php foreach($lista as $produtos):?>
        <tr>
        <td><?=$produtos['id'];?></td>
        <td><?=$produtos['ident'];?></td>
        <td><?=$produtos['quantia'];?></td>
        <td><?=date('d/m/Y',strtotime($produtos['data_en']));?></td>
        <td><?=date('d/m/Y',strtotime($produtos['data_saida']));?></td>
        <td><?=$produtos['refrig'];?></td>
        <td><?=$produtos['cong'];?></td>
        

       
<!--<td>

            <a href="cadastrar_vacuo.php?id=<//?=$produtos['id'];?>">
            <img class="del" src="../IMG/checklist.png">
           
    </a>
        </td>    
    -->
        
        <td>
            <a href="editar_vacuo.php?id=<?=$produtos['id'];?>">
            <img class="del" src="../IMG/pen.png"></a>
        </td>    
    
        <td>
            <a class='trash3' href="excluir_vacuo.php?id=<?=$produtos['id'];?> ">
            <img class="del" src="../IMG/bin.png"></a>
        </td>

    
        </tr>

    <?php endforeach; ?>



</table>
<div  class="btn9">
<a href="../Login/index.php">Voltar á página inicial</a>
</div>

<!-- importação das bibliotecas do bootstrap -->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
   integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--==========================================================================================-->
<script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
  </script>
</body>
</html>
    

