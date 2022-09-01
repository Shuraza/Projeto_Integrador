<?php
include "header_admin.php";
include "../include/MySql.php";
?>
<div class="container">
    <div class="row">
        <?php
        $sql = $pdo->prepare('SELECT * FROM PRODUTOS ');
        if ($sql->execute()) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);

            echo "<table border='1' class='table table-bordered '>";
            echo "<thead class='table-dark'>";
            echo "<tr>";
            echo "  <th>idProduto</th>";
            echo "  <th>Tipo</th>";
            echo "  <th>Nome</th>";
            echo "  <th>Cor</th>";
            echo "  <th>Tamanho</th>";
            echo "  <th>Material</th>";
            echo "  <th>Descrição</th>";
            echo "  <th>Imagem</th>";
            echo "  <th>Alterar</th>";
            echo "  <th>Excluir</th>";
            echo "</thead>";
            echo "</tr>";
            foreach ($info as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value['idProduto'] . "</td>";
                echo "<td>" . $value['idclasse'] . "</td>";
                echo "<td>" . $value['nome'] . "</td>";
                echo "<td>" . $value['cor'] . "</td>";
                echo "<td>" . $value['tamanho'] . "</td>";
                echo "<td>" . $value['material'] . "</td>";
                echo "<td>" . $value['descricao'] . "</td>";
                $imagem = $value['imagem'];
                echo '<td><img style= "width:80px;"src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';

                echo "<td><center><a class='a' href='altProduto.php?id=" . $value['idProduto'] . "'>(+)</a></center></td>";
                             
                echo "<td><center><a class='a' href='#'altProduto.php?id=" . $value['idProduto'] . "' onclick='deletaProduto(" . $value['idProduto'] . ")';
                    '>(-)</a></center></td>";

                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
<div class="botao">    
    <input type="button" value="Cadastrar Produto" onclick="parent.location='cadProduto.php'">
    <input type="button" value="Voltar" onclick="parent.location='../clone/index2.php'">
</div>

    </div>
</div>

<script>
    function deletaProduto(idProduto) {
        if (confirm("Tem absoluta certeza da sua decisãa?????")) {
            document.location = 'delProduto.php?id=' + idProduto;
        }
    }
</script>

<?php
include "footer_admin.php";
