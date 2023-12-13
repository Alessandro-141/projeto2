
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Document</title>
</head>
<body>
    <header class="container">
        
<h1>Pesquisar Produtos</h1>

<form action="pesquisar_por_nome.php" method="GET">
		<!--<label>Nome do produto</label>-->
		<input type="text" name= 'pesq' size="50" placeholder="Insira o nome do produto">
		<button>Buscar</button>
	</form>
    </header>
   
    <style>
        input[type=text] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  color: red;
}

button{
    width:150px;
    color: red;
    margin-left: 20px;
    border-radius: 10px;
}

    </style>

</body>
</html>