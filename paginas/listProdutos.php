<?php
include "../include/MySql.php";

$sql = $pdo->prepare('SELECT * FROM usuario');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>Código</th>";
        echo "  <th>Nome</th>";
        echo "  <th>Descrição</th>";
        echo "  <th></th>";
        echo "  <th>Senha</th>";
        echo "  <th>Imagem</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";
        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['codigo']."</td>";
            echo "<td>".$value['nome']."</td>";
            echo "<td>".$value['email']."</td>";
            echo "<td>".$value['telefone']."</td>";
            echo "<td>".$value['senha']."</td>";
            $imagem= $value['imagem'];
            echo '<td><img style= "width:80px;"src="data:image/jpg;charset=utf8;base64,' .base64_encode($imagem).'"></td>';

            echo "<td><center><a href='altUsuario.php?id=".$value['codigo']."'>(+)</a></center></td>";
            echo "<td><center><a href='delUsuario.php?id=".$value['codigo']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<input type="button" value="Cadastrar" onclick="parent.location='cadUsuario.php'">
<h3><a href="principal.php">Principal</a></h3>

