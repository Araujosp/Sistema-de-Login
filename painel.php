<?php

include "config.php";

if(!isset($_SESSION['id'])){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
    <h2>Bem vindo ao painel <?php echo $_SESSION['nome']; ?> </h2>
    <p>fazer LogOut:</p><br>
    <a href="logout.php">Sair</a>
</body></html>