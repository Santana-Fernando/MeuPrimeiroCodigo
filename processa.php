<?php

session_start();

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";

$usuario = "INSERT INTO usuarios (NOME, EMAIL, CRIADO) VALUES ('$nome', '$email', NOW())";

$resultado_usuario = mysqli_query($conn, $usuario);

if(mysqli_insert_id($conn))
{
    $_SESSION['msg'] = "<p style='color: pink;'>Usuário cadastrado com sucesso</p>";
    header("Location: index.php");
}
else
{
    $_SESSION['msg'] = "<p style='color: gray;'>Erro ao cadastrar usuário</p>";
    header("Location: index.php");
}
