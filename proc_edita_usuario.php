<?php

session_start();

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";

$usuario = "UPDATE usuarios SET NOME = '$nome' , EMAIL = '$email' , MODIFICADO = NOW() WHERE ID = '$id' ";

$resultado_usuario = mysqli_query($conn, $usuario);

if(mysqli_affected_rows($conn))
{
    $_SESSION['msg'] = "<p style='color: pink;'>Usuário editado com sucesso</p>";
    header("Location: listar.php");
}
else
{
    $_SESSION['msg'] = "<p style='color: gray;'>Erro ao editar usuário</p>";
    header("Location: editar_usuario.php?id=$id");
}
