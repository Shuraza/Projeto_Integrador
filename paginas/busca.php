<?php
include "../include/conexao.php";
?>

<title>Resultados</title>
<link rel="stylesheet" href="../assets/css/busca.css">
<div class="resultado">
    <?php

include('MySql.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca</title>
</head>
<body>
    <h1>Lista de Veículos</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>Marca</th>
            <th>Veículo</th>
            <th>modelo</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM produtos 
                WHERE nome LIKE '%$pesquisa%' 
                OR cor LIKE '%$pesquisa%'
                OR descricao LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <div class="resultados">
                        <ul>
                            <li><strong>Nome - </strong><?php echo $dados['nome']; ?></li>
                            <hr>
                            <li><strong>Cor - </strong><?php echo $dados['cor']; ?></li>
                            <hr>
                            <li><strong>Descrição - </strong><?php echo $dados['descricao']; ?></li>
                            <hr>
                            <a href="">Saiba mais</a>
                        </ul>
                    </div>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['cor']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            <?php
        }
    ?>
</div> 
        <?php
        } ?>
    </table>
</body>
</html>