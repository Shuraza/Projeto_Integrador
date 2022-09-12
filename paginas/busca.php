<?php
include "../include/conexao.php";
?>

<title>Resultados</title>
<link rel="stylesheet" href="../assets/css/busca.css">

<div class="aparencia">
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
                            <a href="#">Saiba mais</a>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        <?php
        } 
    ?>
</div>