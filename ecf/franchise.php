<br><a href="instance.php">redirection admin</a>

<?php 
session_start();
$pdo = new PDO('mysql:dbname=membre;host=127.0.0.1;port:3306;','root','agaudin');
$recupUser = $pdo->query('SELECT*FROM structure');
while($user = $recupUser->fetch()){
    ?>
    <li><?=$user['email']; ?></li>
    <?php
}
?>
<br>
<?php 
        echo 'franchise' . ' ' . 'email' . ' ' . 'mdp' . ' ' . 'adresse' . '<br>';
		$pdo =new PDO('mysql:dbname=membre;host=127.0.0.1;port:3306;','root','agaudin');
		$requete = "SELECT * FROM structure";
		$resultat = $pdo->query($requete);
		while ($ligne = $resultat->fetch()) {
           
			echo $ligne['structure_name'] . ' ' . $ligne['email'] . ' ' . $ligne['mdp'] . ' ' . $ligne['adresse'] . '<br>';
		}
		?>
        
        <br><a href="bd/ajouterstructure.php">ajouter une structure</a>