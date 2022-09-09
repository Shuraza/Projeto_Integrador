<?php
include "head.php";
include "include/MySql.php";

$codigo = "";
if (isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
} 


$sql = $pdo->prepare('SELECT * FROM PRODUTOS WHERE idProduto = ?');
if ($sql->execute(array($codigo))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($info as $key => $value) {

        echo "<div class='container-produto'>";
        echo "<div class='container-compras'>";
        echo "<div class='container-image'>";
        $imagem = $value["imagem"];
        echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '">';
        echo "</div>";
        echo "<div class='container-informacoes'>";
        
        echo '<h1>'.$value["nome"].'</h1>';
        echo   "<div class='tamanho-cor'>";
        echo  '<p>'.$value["cor"] .'</p>'; 
        echo     "</div>";
        echo     "<div class='tamanho-tm'>";
        echo          '<p>'.$value["tamanho"].'</p>';
        echo       "</div>";
        echo      "<div class='tamanho-material'>";
        echo         '<p>'.$value["material"].'</p>';
        echo    "</div>";
        echo      "<div class='tamanho-descricao'>";
        echo     '<p>'.$value["descricao"].'</p>';
        echo "</div>";
        echo "<div class='container-botao'>";
        echo   " <a href='https://api.whatsapp.com/send?phone=554799255732' target='_blank'><input type='submit' value='Fale direto com o Vendedor'></a>";
        echo  "</div>";
        echo  "</div>";
        echo    "</div>";
        echo"</div>";
    }
}
$sql = $pdo->prepare('SELECT * FROM PRODUTOS WHERE idclasse LIKE "1" ');
echo "<div class='mais-produtos'>";
echo "<h2>MAIS PRODUTOS</h2>";
echo "</div>";
echo"<div class='outros-produtos'>";
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($info as $key => $value) {
        echo "<div class='container-outras-imgs'>";
        $imagem = $value["imagem"];
        echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '">';
        echo  "</div>";
        
    }
}
echo"</div>";


include "footer.php";
