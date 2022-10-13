<?php require('header/header.php');?>

<?php
    session_start();
    $pdo = new PDO('mysql:dbname=membre;host=127.0.0.1;port:3306;','root','agaudin');

    $erreur="";
    if(isset($_POST['valider'])){
        if(!empty($_POST['login']) AND !empty($_POST['pass'])){
            $login= htmlspecialchars($_POST["login"]);
            $pass= htmlspecialchars($_POST["pass"]);            

            $recupUser = $pdo->prepare('SELECT*FROM admin WHERE name = ? AND mdp = ?');
            $recupUser->execute(array($login, $pass));

            if($recupUser->rowCount()>0){
                $_SESSION["login"] = $login;
                $_SESSION["pass"] = $pass;
                $_SESSION["id"] =$recupUser->fetch()['id'];
                header('location:instance.php');
            }
        }
    }
?>

<form name="fo" method="post" action="">
    <div class="label">login</div>
    <input type="text" name="login"/>
    <br>
    <div class="label">mot de passe</div>
    <input type="password" name="pass"/>
    <br>
    <input type="submit" name="valider" value="s'authentifier">
</form>

<?php require('footer/footer.php');?>
