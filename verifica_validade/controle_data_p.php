


<?php
session_start();
include_once('../Conexao/conexao.php');

$lista = [];
$sql = $conn->query("SELECT p.cod_categoria, 
pr.classificacao,
pr.data_sa,
pr.quant,
DATEDIFF(data_sa,data_e ) as difference,
pr.val_apos_abert

FROM parametros p
inner join produtos_processados pr
on pr.id = p.cod_categoria
"); 

// ===========================================

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
<body>


<h1>Conferência de estoque e validade</h1>

<table class="table table-striped" class="table table-bordered tabele-hover" id="minhaTabela" >
<thead>
    <tr>
        <th>ID</th> 
        <th>Categoria</th> 
        <th>Quantidade</th> 
        <th>Data Saída</th> 
        <th>Validade </th> 
        
    </tr>
</thead>
    
    <?php foreach($lista as $produtos):?>
        <tr>

        <td><?=$produtos['cod_categoria'];?></td>
        <td><?=$produtos['classificacao'];?></td>
        <td><?=$produtos['quant'];?></td>
        <td><?=date('d/m/Y',strtotime($produtos['data_sa']));?></td>
        <td><?=$produtos['val_apos_abert'];?></td>

        <!-- ================================================= -->
        
  
        
       

    
        </tr>
   
    <?php endforeach; ?>



</table>

<div  class="btn17">
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
    

