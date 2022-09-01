<?php
include "include/MySql.php";

$sql = $pdo->prepare('SELECT * FROM PRODUTOS WHERE idclasse LIKE "1" ');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($info as $key => $value) {
    echo $value["nome"] ;
    $imagem = $value["imagem"];
    echo  '<img style= "width:300px;"src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';

    }
}
?>
