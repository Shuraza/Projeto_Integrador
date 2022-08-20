<?php
    include "../include/MySql.php";

    $nome = "";
    $cor= "";
    $tamanho= "";
    $material= "";
    $descricao= "";

    $nomeErro = "";
    $corErro= "";
    $tamanhoErro= "";
    $materialErro= "";
    $descricaoErro= "";
    $msgErro="";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        if (!empty($_FILES["image"]["name"])){
            //Pegar informações do arquivo
            $fileName = basename($_FILES['image']['name']);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            //Array de extensoes permitidas
            $allowTypes = array('jpg','png','jpeg');

            if (in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = file_get_contents($image);

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

            

                if ($nome && $cor && $tamanho && $material && $descricao ) {
                    
                    $sql = $pdo->prepare("SELECT * FROM PRODUTOS WHERE nome = ?");
                    if ($sql->execute(array($nome))){
                        if ($sql->rowCount() <= 0){
                            $sql = $pdo->prepare("INSERT INTO PRODUTOS (idProduto, nome, cor, tamanho, material, descricao, imagem)
                                                VALUES (null, ?, ?, ?, ?, ?, ?)");
                            if ($sql->execute(array($nome, $cor, $tamanho, $material, $descricao, $imgContent))){
                                $msgErro = "Dados cadastrados com sucesso!";
                                $nome = "";
                                $cor= "";
                                $tamanho= "";
                                $material= "";
                                $descricao= "";
                                header('location:listProdutos.php');
                            } else {
                                $msgErro = "Dados não cadastrados!";
                            }  
                        } else {
                            $msgErro = "Nome de Produto já cadastrado!!";
                        }    
                    } else {
                        $msgErro = "Erro no comando SELECT!";
                    }    
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            } else {
                $msgErro = "Somente arquivos JPG, JPEG, PNG são permitidos";
            }     
        } else {
            $msgErro = "Imagem não selecionada!!";
        }                       
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Cadastro de Produtos</legend>

            Nome: <input type="text" name="nome" value="<?php echo $nome?>">
            <span class="obrigatorio">*<?php echo $nomeErro?></span>
            <br>
            Cor: <input type="text" name="cor" value="<?php echo $cor?>">
            <span class="obrigatorio">*<?php echo $corErro?></span>
            <br>
            Tamanho: <input type="text" name="tamanho" value="<?php echo $tamanho?>">
            <span class="obrigatorio">*<?php echo $tamanhoErro?></span>
            <br>
            Material: <input type="text" name="material" value="<?php echo $material?>">
            <span class="obrigatorio">*<?php echo $materialErro?></span>
            <br>
            Descrição: <input type="text" name="descricao" value="<?php echo $descricao?>">
            <span class="obrigatorio">*<?php echo $descricaoErro?></span>
            <br>
            <br>
            <input type="file" name="image">
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro?></span>
</body>
</html>