<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD-cadastro</title>
</head>
<body>
    <h1>Cadastrar usuário</h1>


    <?php
        if(isset($_SESSION['msg']))
        {
            echo($_SESSION['msg']);
            unset($_SESSION['msg']);
        }
    ?>
    <br>
    <form method="POST" action="processa.php">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite o seu nome completo!">

        <br>
        <br>

        <label>E-mail:</label>
        <input type="email" name="email" placeholder="Digite o seu melhor e-mail">

        <br>
        <br>

        <input type="submit" value="Cadastrar">

        <br>
        <br>

        <a href="listar.php">Listar</a>
    </form>
</body>
</html>