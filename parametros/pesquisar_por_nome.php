
<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "projeto_admin";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Document</title>
</head>
<body>
<?php


if (!isset($_GET['pesq'])) {
	header("Location: form_pesq.php");
	exit;
}
$nome = "%".trim($_GET['pesq'])."%";

	//$result_cursos = "SELECT * FROM produtos_in_natura WHERE categoria_prod LIKE '%$pesquisar%'LIMIT 15 "; // Posso por qualquer campo tabela do database
$result_produtos = "SELECT p.cod_categoria, 
pin.categoria_prod,
pin.qtde, 
pin.temp_max, 
pin.data_entr, 
pin.data_sai, 
pin.val, 

proces.classificacao,
proces.quant,
proces.data_e,
proces.data_sa,
proces.val_sem_abert_emb,
proces.val_apos_abert,

prf.categoria,
prf.quantidade, 
prf.data_ent, 
prf.data_s, 
prf.armaz_temp_max, 
prf.validade,

pv.ident,
pv.quantia,
pv.data_en,
pv.data_saida,
pv.refrig,
pv.cong
FROM parametros p
inner join produtos_in_natura pin
on pin.id = p.cod_categoria
 inner join produtos_processados proces
on proces.id = p.cod_categoria 
inner join produtos_refrigerados prf
on prf.id = p.cod_categoria 
inner join produtos_vacuo pv
on pv.id = p.cod_categoria
 WHERE categoria_prod LIKE  '%$nome%' LIMIT 4"; // PRESTAR ATENÇÃO NESTA VARIÁVEL "$nome".
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	
	

	?>
	<!-- Com o  id="minhaTabela" coloca os limitadores de linhas 
	<table  class="table table-striped" class="table table-bordered tabele-hover" id="minhaTabela">
-->
	<table  class="table table-striped" class="table table-bordered tabele-hover" >
<thead>
    <tr class="table-success">
        <th>Parâmetros</th> 
        <th>In Natura</th>
        <th>Quantidade</th>
        <th>Temperatura Maxíma</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Validade</th>
        <!-- ============================================== -->
        <th>Processados</th>
        <th>Quantidade</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Produtos Fechados</th>
        <th>Produtos Abertos</th>
        
        <!-- ============================================== -->
        <th>Refrigerados</th>
        <th>Quantidade</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Temperatura Maxíma</th>
        <th>Validade</th>
        <!-- =============================================== -->
        <th>Produtos à vácuo</th>
        <th>Quantidade</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Produtos Refrigerados</th>
        <th>Produtos Congelados</th>
        <!--<th>Cadastrar</th>-->
        <!--<th>Editar</th>-->
        <!--<th>Excluir</th>-->
        
		</tr>
	</thead>


	<?php
	
	
	while($rows_produtos = mysqli_fetch_array($resultado_produtos)){
		echo  '<tr class="table-danger">';
		echo "<td>".$rows_produtos['cod_categoria']."</td>";
		echo "<td>".$rows_produtos['categoria_prod']."</td>";
		echo "<td> ".$rows_produtos['qtde']."<td>";
		echo "<td>".$rows_produtos['temp_max']."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_produtos['data_entr']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_produtos['data_sai']))."</td>";
		echo "<td>".$rows_produtos['val']."<br>";

		echo "<td>".$rows_produtos['classificacao']."</td>";
		echo "<td>".$rows_produtos['quant']."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_produtos['data_e']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_produtos['data_sa']))."</td>";
		echo "<td>".$rows_produtos['val_sem_abert_emb']."</td>";
		echo "<td>".$rows_produtos['val_apos_abert']."</td>";

		echo "<td>".$rows_produtos['categoria']."</td>";
		echo "<td>".$rows_produtos['quantidade']."</td>";
		echo "<td".date('d/m/Y',strtotime($rows_produtos['data_ent']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_produtos['data_s']))."</td>";
		echo "<td>".$rows_produtos['armaz_temp_max']."</td>";
		echo "<td>".$rows_produtos['validade']."</td>";

		echo "<td>".$rows_produtos['ident']."</td>";
		echo "<td>".$rows_produtos['quantia']."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_produtos['data_en']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_produtos['data_saida']))."</td>";
		echo "<td>".$rows_produtos['refrig']."</td>";
		echo "<td>".$rows_produtos['cong']."</td>";
		
		echo '</tr>';
	}

	?>
	</table>

<div  class="btn">
<a href="form_pesq.php">Nova consulta</a>
</div>




<div  class="btn1">
<a href="../Login/index.php">Voltar á página inicial</a>
</div>
<?php


?>
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


