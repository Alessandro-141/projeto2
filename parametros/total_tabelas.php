
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Document</title>
</head>
<body >
	
<?php


	//$result_cursos = "SELECT * FROM produtos_in_natura WHERE categoria_prod LIKE '%$pesquisar%'LIMIT 15 "; // Posso por qualquer campo tabela do database
$result_cursos = "SELECT p.cod_categoria, 
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
on pv.id = p.cod_categoria"; // Posso por qualquer campo tabela do database
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	
	
	?>
	<table class='table table-striped' class='table table-bordered tabele-hover'>
<thead>
    <tr>
        <th>ID Parâmetros</th> 
        <th>Categoria de In Natura</th>
        <th>Quantidade dos Produtos</th>
        <th>Temperatura Maxíma</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Validade</th>
        <!-- ============================================== -->
        <th>Categoria de Processados</th>
        <th>Quantidade dos Produtos</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Produtos Fechados</th>
        <th>Produtos Abertos</th>
        
        <!-- ============================================== -->
        <th>Categoria de Refrigerados</th>
        <th>Quantidade dos Produtos</th>
        <th>Data de Entrada</th>
        <th>Data de Saida</th>
        <th>Temperatura Maxíma de Armazenamento</th>
        <th>Validade</th>
        <!-- =============================================== -->
        <th>Categoria de Produtos à vácuo</th>
        <th>Quantidade de produtos à vácuo</th>
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
	
	
	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo  '<tr>';
		echo "<td>".$rows_cursos['cod_categoria']."</td>";
		echo "<td>".$rows_cursos['categoria_prod']."</td>";
		echo "<td> ".$rows_cursos['qtde']."<td>";
		echo "<td>".$rows_cursos['temp_max']."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_cursos['data_entr']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_cursos['data_sai']))."</td>";
		echo "<td>".$rows_cursos['val']."<br>";

		echo "<td>".$rows_cursos['classificacao']."</td>";
		echo "<td>".$rows_cursos['quant']."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_cursos['data_e']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_cursos['data_sa']))."</td>";
		echo "<td>".$rows_cursos['val_sem_abert_emb']."</td>";
		echo "<td>".$rows_cursos['val_apos_abert']."</td>";

		echo "<td>".$rows_cursos['categoria']."</td>";
		echo "<td>".$rows_cursos['quantidade']."</td>";
		echo "<td".date('d/m/Y',strtotime($rows_cursos['data_ent']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_cursos['data_s']))."</td>";
		echo "<td>".$rows_cursos['armaz_temp_max']."</td>";
		echo "<td>".$rows_cursos['validade']."</td>";

		echo "<td>".$rows_cursos['ident']."</td>";
		echo "<td>".$rows_cursos['quantia']."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_cursos['data_en']))."</td>";
		echo "<td>".date('d/m/Y',strtotime($rows_cursos['data_saida']))."</td>";
		echo "<td>".$rows_cursos['refrig']."</td>";
		echo "<td>".$rows_cursos['cong']."</td>";
		
		echo '</tr>';
	}

	?>
	</table>






<div  class="btn11">
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


