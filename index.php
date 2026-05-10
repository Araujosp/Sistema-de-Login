<?php
include "config.php";


if (isset($_POST['email']) && isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        echo "preencha seu email";
    }else if (strlen($_POST['senha']) == 0){
        echo "preencha sua senha";
    } else {
        # limpando variavel para se proteger de mysqli injection 
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->connect_error);

        $quantidade = $sql_query->num_rows; #conta as linhas

        if ($quantidade == 1){

        $usuario = $sql_query ->fetch_assoc(); 
        /* 
        fetch_assoc()
        Ele pega a linha encontrada e transforma em array associativo. ex: 
            $usuario = [
            "id" => 1,
            "nome" => "Gabriel",
            "email" => "gabriel@gmail.com"
            ];
        */

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit;

        }else {
            echo "Falha ao logar! Senha ou usuarios incorretos";
        }

        }


}

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua Conta</h1>
    <form action="" method = "POST">
        <p>
        <label>email</label>
        <input type="text" name = "email">
        </p>

        <p>
        <label>senha</label>
        <input type="password" name = "senha">
        </p>

        <p>
        <button type = "submit">Enviar</button>
        </p>

    </form>
</body>
</html>
