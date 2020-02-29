<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'ID', FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "SELECT * FROM usuarios WHERE ID = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD-Editar</title>
</head>
<body>
    <h1>Editar usuário</h1>


    <?php
        if(isset($_SESSION['msg']))
        {
            echo($_SESSION['msg']);
            unset($_SESSION['msg']);
        }
    ?>
    <br>
    <form method="POST" action="proc_edita_usuario.php">

        <input type="hidden" name="ID" value="<?php echo $row_usuario['ID']; ?>">

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite o seu nome completo!" value="<?php echo $row_usuario['NOME']; ?>">

        <br>
        <br>

        <label>E-mail:</label>
        <input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['EMAIL']; ?>">

        <br>
        <br>

        <input type="submit" value="Editar">

        <br>
        <br>

        <a href="listar.php">Listar</a>
    </form>
</body>
</html>