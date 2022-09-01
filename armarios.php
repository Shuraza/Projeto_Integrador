<?php
include "head.php";
include "include/MySql.php";


$sql = $pdo->prepare('SELECT * FROM PRODUTOS WHERE idclasse LIKE "2" ');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($info as $key => $value) {
    echo $value["nome"] ;
    $imagem = $value["imagem"];
    echo  '<img style= "width:300px;"src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';

    }
}
?>

<h1 class="espacos-h1">ARMÁRIOS</h1>

<section class="espacos-class">
    <div>
    <a href="#"><img src="assets/img/cinza.jpg" >
    <p>#################</p>
    <h2>R$ ###,##</h2></a>
    </div>
    <div>
    <a href="#"><img src="assets/img/cinza.jpg" >
    <p>#################</p>
    <h2>R$ ###,##</h2></a>
    </div>
    <div>
    <a href="#"><img src="assets/img/cinza.jpg" >
    <p>#################</p>
    <h2>R$ ###,##</h2></a>
    </div>
    <div>
    <a href="#"><img src="assets/img/cinza.jpg" >
    <p>#################</p>
    <h2>R$ ###,##</h2></a>
    </div>
    <div>
    <a href="#"><img src="assets/img/cinza.jpg" >
    <p>#################</p>
    <h2>R$ ###,##</h2></a>
    </div>
    <div>
    <a href="#"><img src="assets/img/cinza.jpg" >
    <p>#################</p>
    <h2>R$ ###,##</h2></a>
    </div>

</section>

<?php
include "footer.php"
?>