<?php
session_start();
include_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD- Listar</title>
</head>
<body>
    <a href="index.php">Cadastrar</a>
    <br>
    <a href="listar.php">Listar</a>
    <br>
    <h1>Listar usuário</h1>


    <?php
        if(isset($_SESSION['msg']))
        {
            echo($_SESSION['msg']);
            unset($_SESSION['msg']);
        }
        
        //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Setar a quantidade de itens por página
        $qtd_result_pg = 2;

        //calcular o inicio da visualização
        $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;

        $result_usuarios= "SELECT * FROM usuarios LIMIT $inicio, $qtd_result_pg";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);

        while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
            echo "ID: " . $row_usuario['ID'] . "<br>";
            echo "NOME: " . $row_usuario['NOME'] . "<br>";
            echo "E-MAIL: " . $row_usuario['EMAIL'] . "<br>";
            echo "<a href='editar_usuario.php?ID=" . $row_usuario['ID'] . "'>Editar</a> <br>";
            echo "<a href='proc_apagar_usuario.php?ID=" . $row_usuario['ID'] . "'>Apagar</a> <br> <hr>";
    
        }

        //paginação-somar a quantidade de usuários.
        $result_pg = "SELECT COUNT(ID) AS num_result from usuarios";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        //echo $row_pg['num_result'];

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);

        //Limitar a quantidade de link antes e depois
        $max_links = 2;
        echo "<a href='listar.php?pagina=1'>Primeira</a>";

        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1)
            {
                echo "<a href='listar.php?pagina=$pag_ant'> $pag_ant </a>";
            }
           
        }

        
        echo "$pagina";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg)
            {
                echo "<a href='listar.php?pagina=$pag_dep'> $pag_dep </a>";
            }
        }


        echo "<a href='listar.php?pagina=$quantidade_pg'>Última</a>";


        
    ?>
    <br>
</body>
</html>