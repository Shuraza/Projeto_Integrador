<?php
include "../include/MySql.php";
include "../include/functions.php";

session_start();
$_SESSION['email'] = "";
$_SESSION['senha'] = "";
$email = "";
$emailErro = "";
$senha = "";
$senhaErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $emailErro = "Email é obrigatório";
    } else {
        $email = test_input($_POST['email']);
    }

    if (empty($_POST['senha'])) {
        $senhaErro = "Senha é obrigatório";
    } else {
        $senha = test_input($_POST['senha']);
    }

    if ($email && $senha) {
        $sql = $pdo->prepare("SELECT * FROM CADASTRO WHERE email=? AND senha=?");
        if ($sql->execute(array($email, ($senha)))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (count($info) > 0) {
                foreach($info as $key=>$values){
                    $_SESSION['email'] = $values['email'];
                    $_SESSION['senha'] = $values['senha'];
                }
                header('location:../clone/index2.php');
                // QUALQUER COISA ARRUMA ISSO AQUI;
            } else {
                $msgErro = "<BR>Usuário não cadastrado!";
            }
        } else {
            $msgErro = "Usuário não cadastrado!";
        }
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <div class="form">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="logo">
                <img src="../assets/img/topferro2.png">
            </div>

            <div class="login">
                <legend>Administrador</legend>



                <label for="email"></label>
                <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email">



                <label for="senha"></label>
                <input type="password" name="senha" value="<?php echo $senha ?>" placeholder="Senha">



                <div class="botao">
                    <input type="submit" value="Login" name="login">
                </div>
                <span><?php echo $msgErro ?></span>
            </div>
        </form>

    </div>
</body>

</html>