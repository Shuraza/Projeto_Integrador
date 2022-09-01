<?php
include "head.php";
include "include/MySql.php";
$sql = $pdo->prepare('SELECT * FROM PRODUTOS');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($info as $key => $value) {
    echo $value["idProduto"] ;
    $imagem = $value['imagem'];
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