
<?php

// 1ª coisa é chamar o arquivo de conexão
include_once ('../Conexao/conexao.php');
?>

<?php
/* Agora eu preciso pegaros dados que vem do cadastrar,
quando apertar o botão de salvar no cadastrar vai ser 
enviado através do método POST o nome_categoria,
comidas e quantidade.
*/
/* Abaixo vou capturar o parãmetros que vem do cadastrar.php
OBS: Aqui só captura os parâmetros que vem do cadastrarfunc.ph
*/
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
// $email = filter_input(INPUT_POST, 'email'); // Original
$email = filter_input(INPUT_POST, "email",FILTER_VALIDATE_EMAIL); // Valida o email se for válido.
//$senha = filter_input(INPUT_POST, 'senha'); // Original
$senha = sha1($_POST['senha']); // Funciona bem, converte para senha criptografada.



/* Dentro deste bloco de comandos, a lógica é se for inserido com sucesso 
vai retornar para o index.php, ao contrario, retorna para cadastrar.php.
*/
if(!$id && $nome && $email && $senha){

    /* Verifiacando se já não tem produtos os mesmos produtos cadastrados,
    E COMO VOU saber os campos, será desta maneira abaixo.
    ESTOU VERIFICANDO SE NÃO HÁ DUPLICAÇÃO DO CAMPO OU CAMPOS POSSO POR + De 1.

    Aqui eu implementei o "id" auto incremento para que eu consiga editar e cadastrar, pois 
    a condição anterior era essa: WHERE nome_categoria = :nome_categoria
     $sql= $conn->prepare("SELECT * FROM produtos WHERE nome_categoria = :nome_categoria");
    */
   
    $sql= $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id); // Alterei :nome_categoria
    $sql->execute();
    // Caso não esteja cadastrado executa este comando de bloco abaixo.
    if($sql->rowCount() === 0) {
        $sql = $conn->prepare("INSERT INTO usuarios(id, nome, email, senha)
        VALUES(:id, :nome, :email, :senha)");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        
         // Após salvar voltarei para a página index.
         header('Location: controlefunc.php');
        $exit;

        /* E se ele já estiver cadastrado vai direcionar para o cadastrar.php
        Farei o teste com um produto cadastrado pelo nome_categoria que 
        conste no banco de dados.
        */
    }else {
        header('Location: controlefunc.php');
    }

}else{
        header('Location: controlefunc.php');
    $exit;
}
?>
<?php

// Definimos o nome de usuário e senha de acesso
//$usuario = "usuario"; // Original
//$senha = "senha"; // Original
// Definimos o nome de usuário e senha de acesso
$usuario = "alessandro";
$senha = "123456";
// Criamos uma função que exibirá uma mensagem de erro caso os dados estejam errados
function erro(){
    // Definindo Cabeçalhos
    header('WWW-Authenticate: Basic realm="Administracao"');
    header('HTTP/1.0 401 Unauthorized');
    // Mensagem que será exibida
    echo '<h1>Voce não tem permissão para acessar essa área</h1>';
    // Pára o carregamento da página
    exit;
}
// Se as informações não foram setadas
if (!isset($_SERVER['PHP_AUTH_USER']) or !isset($_SERVER['PHP_AUTH_PW'])) {
    erro();
} 
// Se as informações foram setadas
else {
    // Se os dados informados forem diferentes dos definidos
    if ($_SERVER['PHP_AUTH_USER'] != $usuario or $_SERVER['PHP_AUTH_PW'] != $senha) {
        erro();
    }
}
?>


