<?php

$hostname = "localhost";
$bancodedados = "teste";
$usuario = "root";
$senha = "";

#tem que ser exatamente nessa ordem host, user, senha, banco#
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($mysqli->connect_errno){
    echo "falha ao conectar: {" . $mysqli->connect_errno . "} " . $mysqli->connect_error;
            # numero do erro #               # qual o erro
}