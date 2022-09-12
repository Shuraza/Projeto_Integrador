<?php
include "../include/MySql.php";

$idProduto = "";
$nome = "";
$cor = "";
$tamanho = "";
$material = "";
$descricao = "";
$imgContent = "";


$nomeErro = "";
$corErro = "";
$tamanhoErro = "";
$materialErro = "";
$descricaoErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $idProduto = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM PRODUTOS WHERE idProduto = ?");
    if ($sql->execute(array($idProduto))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $idProduto = $value['idProduto'];
            $tipo = $value['idclasse'];
            $nome = $value['nome'];
            $cor = $value['cor'];
            $tamanho = $value['tamanho'];
            $material = $value['material'];
            $descricao = $value['descricao'];
            $imgContent = $value['imagem'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['nome']))
        $nomeErro = "Nome é obrigatório!";
    else
        $nome = $_POST['nome'];

    if (empty($_POST['cor']))
        $corErro = "Cor é obrigatório!";
    else
        $cor = $_POST['cor'];

    if (empty($_POST['tamanho']))
        $tamanhoErro = "Tamanho é obrigatório!";
    else
        $tamanho = $_POST['tamanho'];

    if (empty($_POST['material']))
        $materialErro = "Material é obrigatório!";
    else
        $material = $_POST['material'];

    if (empty($_POST['descricao']))
        $descricaoErro = "Descrição é obrigatório!";
    else
        $descricao = $_POST['descricao'];

    if (empty($_POST['tipo']))
        $tipoErro = "Tipo é obrigatório!";
    else
        $tipo = $_POST['tipo'];



    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
        } else {
            $msgErro = "Somente arquivos JPG, JPEG, PNG são permitidos";
        }
    }

    if ($nome && $cor && $material && $tamanho && $descricao) {
        $sql = $pdo->prepare("SELECT * FROM PRODUTOS WHERE idProduto = ?");
        $sql = $pdo->prepare("UPDATE PRODUTOS SET idProduto=?, 
                                                             nome=?, 
                                                             idclasse=?,
                                                             cor=?, 
                                                             tamanho=?, 
                                                             material=?,
                                                             descricao=?,
                                                             imagem=?
                                                       WHERE idProduto=?");

        if ($sql->execute(array($idProduto, $nome, $tipo, $cor, $tamanho, $material, $descricao, $imgContent, $idProduto))) {
            $msgErro = "Dados alterados com sucesso!";
            header('location:listProdutos.php');
        } else {
            $msgErro = "Dados não cadastrados!";
        }
    } else {
        $msgErro = "Dados não alterados!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="../assets/css/cadProduto.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <legend>Alterar informações do Produto</legend>
        <div class="form1">
            <input type="text" name="nome" value="<?php echo $nome ?>" placeholder="Nome">
            <span class="obrigatorio"><?php echo $nomeErro ?></span>
            <br>
            <input type="text" name="cor" value="<?php echo $cor ?>" placeholder="Cor">
            <span class="obrigatorio"><?php echo $corErro ?></span>
            <br>
            <input type="text" name="tamanho" value="<?php echo $tamanho ?>" placeholder="Tamanho">
            <span class="obrigatorio"><?php echo $tamanhoErro ?></span>
            <br>
            <input type="text" name="material" value="<?php echo $material ?>" placeholder="Material">
            <span class="obrigatorio"><?php echo $materialErro ?></span>
            <br>
            <input type="text" name="descricao" value="<?php echo $descricao ?>" placeholder="Descrição">
            <span class="obrigatorio"><?php echo $descricaoErro ?></span>
            <br>
            <br>
            <input type="file" name="image">
            <br>
            <div class="select">
            <div class="tipo">

                <select name="tipo">
                    <?php
                    $sql1 = $pdo->prepare('SELECT * FROM CLASSE ');
                    if ($sql1->execute()) {
                        $info = $sql1->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($info as $key => $value) {
                            echo '<option value=' . $value['idclasse'] . '>' . $value['Tipo'] . '</option>';
                        }
                    }

                    ?>
        </div>
        <input type="submit" value="Salvar" name="submit">
        <span><?php echo $msgErro ?></span>
    </form>
</body>

</html>