<?php
    include "../include/MySql.php";

    $msgErro = "";
    $idProduto = "";

    if (isset($_GET['id'])){
        $idProduto = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM PRODUTOS WHERE idProduto = ?");
        if ($sql->execute(array($idProduto))){
            if ($sql->rowCount() > 0){
                $msgErro = "Produto excluído com sucesso!";
                header('location:listProdutos.php');
            } else {
                $msgErro = "idProduto não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir o produto!";
        }
    }
    echo "Mensagem de erro: $msgErro";
?>