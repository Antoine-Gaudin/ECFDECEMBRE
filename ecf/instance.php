<?php require('header/header.php')?>
<?php require('bd/dbc.php')?>
<?php
    session_start();
    echo $_SESSION['login'];
?>

<p>tu as réussi a te connecter</p>

<a href="deconnexion/deconnexion.php">déconnexion</a> <br>
<a href="bd/ajouter.php">ajouter une franchise</a> <br>
<!--afficher les structures-->

<?php 
$recupUser = $pdo->query('SELECT*FROM franchise');
while($user = $recupUser->fetch()){
    ?>
    <li><a href="franchise.php"><?=$user['franchise_name']; ?></a></li>
    <?php
}
?>
<br>
<?php 
        echo 'franchise' . ' ' . 'email' . ' ' . 'mdp' . ' ' . 'adresse' . '<br>';
		$pdo =new PDO('mysql:dbname=membre;host=127.0.0.1;port:3306;','root','agaudin');
		$requete = "SELECT * FROM franchise";
		$resultat = $pdo->query($requete);
		while ($ligne = $resultat->fetch()) {
           
			echo $ligne['franchise_name'] . ' ' . $ligne['email'] . ' ' . $ligne['mdp'] . ' ' . $ligne['adresse'] . '<br>';
		}
		?>
 
<?php require('footer/footer.php')?>