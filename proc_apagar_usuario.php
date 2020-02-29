<?php

session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'ID', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id))
{
    $result_usuario = "DELETE FROM usuarios WHERE ID = '$id'";

    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    
    
    if(mysqli_affected_rows($conn))
    {
        $_SESSION['msg'] = "<p style='color: pink;'>Usuário apagado com sucesso</p>";
        header("Location: listar.php");
    }
    else
    {
        $_SESSION['msg'] = "<p style='color: gray;'>Erro ao apagar usuário</p>";
        header("Location: editar_usuario.php?id=$id");
    } 
}
else
{
    $_SESSION['msg'] = "<p style='color: gray;'>Muito provavel que o usuário ja foi apagado ou nem foi cadastrado!</p>";
        header("Location: editar_usuario.php?id=$id");
}