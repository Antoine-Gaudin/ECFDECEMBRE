<?php
session_start();
$pdo = new PDO('mysql:dbname=membre;host=127.0.0.1;port:3306;','root','agaudin');

if(isset($_POST['ajouter'])){
    if(!empty($_POST['franchise']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['adresse'])){
        $franchise = htmlspecialchars($_POST['franchise']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $adresse = htmlspecialchars($_POST['adresse']);

        $newFranchise = $pdo->prepare('INSERT INTO franchise(franchise_name,email,mdp,adresse)VALUES(?, ?, ?, ?)');
        $newFranchise->execute(array($franchise, $email, $mdp, $adresse));
    }else{
        echo "veuillez completez tous les champs";
    }
} 

?>



<a href="/instance.php">redirection administrateur</a>

<form name="fo" method="post" action="">
    <p>Franchise</p>
    <div class="label">Nom de la Franchise</div>
    <input type="text" name="franchise"/>
    <br>
    <div class="label">email</div>
    <input type="text" name="email"/>
    <br>
    <div class="label">mdp</div>
    <input type="text" name="mdp"/>
    <br>
    <div class="label">adresse</div>
    <input type="text" name="adresse"/>
    <br>
    <input type="submit" name="ajouter" value="ajouter">
</form>