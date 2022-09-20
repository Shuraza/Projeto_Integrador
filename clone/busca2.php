<?php
// include "../include/conexao.php";
include "../include/MySql.php";
include "head2.php";

$codigo = "";
if (isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
} 

?>

<title>Resultados</title>
<div class="flex1">
    <?php
    if (!isset($_GET['busca'])) {
    ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
    } else {
        $pesquisa = $_GET['busca'];
        $sql_code = "SELECT * 
            FROM produtos 
            WHERE nome LIKE '%$pesquisa%' 
            OR cor LIKE '%$pesquisa%'";
        $sql = $pdo->prepare($sql_code);
        $sql->execute();

        // $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 

        if ($sql->rowCount() == 0) {
        ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
        } else {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($info as $key => $value) {
            ?>
                <?php

               echo      '<div class="titulos1">';
               echo '<div class="container-resultado">';
               echo  '<div class="resultado-produto">';
               echo '<div class="img-resultado">';
               $imagem = $value["imagem"];
               $codigo = $value['idProduto'];
               $codigo2 = $value['idclasse'];
               echo '<img style= "width:300px;"src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '">';
               echo '</div>';
               echo '<div class="elementos-resultado">';
               echo    '<div class="resultado-descricao">';
               echo        '<h1>' . $value["nome"] . '</h1>';
               echo       '<p>' . $value["cor"] . '</p>';
               echo       '<h3>' . $value["material"] . '</h3>';
               echo    '</div>';
               echo  '<div class="input-resultado">';
               echo         '<a href="compras2.php?codigo='.$codigo.'&codigo2='.$codigo2.'"><input type="submit" value="Veja Mais"></a>';
               echo  ' </div>';
               echo  '</div>';
               echo '</div>';
               echo  '</div>';
               echo '</div>';

                ?>
        <?php
            }
        }
        ?>
    <?php
    }
    ?>
</div>

    <?php
    include "footer2.php";
    ?>