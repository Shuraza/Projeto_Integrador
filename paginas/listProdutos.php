<?php
include "../include/MySql.php";

$sql = $pdo->prepare('SELECT * FROM PRODUTOS ');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>idProduto</th>";
        echo "  <th>Nome</th>";
        echo "  <th>Cor</th>";
        echo "  <th>Tamanho</th>";
        echo "  <th>Material</th>";
        echo "  <th>Descrição</th>";
        echo "  <th>Imagem</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";
        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['idProduto']."</td>";
            echo "<td>".$value['nome']."</td>";
            echo "<td>".$value['cor']."</td>";
            echo "<td>".$value['tamanho']."</td>";
            echo "<td>".$value['material']."</td>";
            echo "<td>".$value['descricao']."</td>";
            $imagem= $value['imagem'];
            echo '<td><img style= "width:80px;"src="data:image/jpg;charset=utf8;base64,' .base64_encode($imagem).'"></td>';

            echo "<td><center><a href='altProduto.php?id=".$value['idProduto']."'>(+)</a></center></td>";
            echo "<td><center><a href='delProduto.php?id=".$value['idProduto']."'>(-)</a></center></td>";
            
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<input type="button" value="Cadastrar Produto" onclick="parent.location='cadProduto.php'">
<h3><a href="../clone/index2.php">Voltar</a></h3>
  <a href="excluir.php" onclick="return confirm('Deseja excluir esse registro ?')">Excluir</a>
