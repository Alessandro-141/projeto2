
<?php

include_once ('../Conexao/conexao.php');

function login($connect){

    if(isset($_POST['acessar']) AND  !empty($_POST['email'])AND 
        !empty($_POST['senha'])) {
       
        $email = filter_input(INPUT_POST, "email",
        FILTER_VALIDATE_EMAIL); // Valida o email se for válido.

        $senha = sha1($_POST['senha']);
       
        $query = "SELECT * FROM usuarios WHERE email =
        '$email' AND senha = '$senha'";
        
        $executar = mysqli_query($connect,$query);
        
        $return = mysqli_fetch_assoc($executar);

        if(!empty($return['email'])){
           
            session_start();
            
            $_SESSION['nome'] = $return['nome'];
            $_SESSION['id'] = $return['id']; 
            $_SESSION['ativa'] = TRUE; 
     
            header('Location: index.php');
        } else{

            echo "<h1 class='oi'>Usuário ou senha não encontrado.</h1>";
        }
       
        
           
        }
    }

    
    function logout() {
        session_start();
        session_unset(); 
        session_destroy();
       
        header('Location: login.php');
    }


    ?>