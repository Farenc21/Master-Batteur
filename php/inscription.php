<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Page D'inscription</title>
	</head>

<body>
	

			<h1><center><p1>Bienvenue sur la page d'inscription</p1></center></h1> 
			<?php
				$mail = $_POST['email'];
				$tel = $_POST['tel'];
				$mdp = $_POST['password2'];
				
				//affiche
				echo $mail;
				echo "<br>";
				echo $tel;
				echo "<br>";
				echo $mdp;
				echo "<br>";
				echo "<br>";
				
				try
				{
					// On se connecte à MySQL  PDO = L'extension PHP Data Object
					$bdd = new PDO('mysql:host=localhost;dbname=master_bt;charset=utf8', 'root', '');
					//echo "Connexion à dbballouki ok";
				}
				catch(Exception $e)
				{
					// En cas d'erreur, on affiche un message et on arrête tout
					die('Erreur de connection nex PDO : '.$e->getMessage());
				}
				$num = 16;
				// Si tout va bien, on peut continuer
				// On insert les données dans table1
				$reponse = $bdd->query("INSERT INTO table1(tel, mail, mdp) VALUES ('$tel','$mail','$mdp')");
				
				$reponse = $bdd->query("SELECT * FROM table1 WHERE 1") ;
				echo "<br>Voici le contenu de la table1<br>";
				//echo "<br>";
				while ($donnees = $reponse->fetch()){				
					echo "\t Tel : ";
					echo $donnees['tel'];
					echo "\t Email : ";
					echo $donnees['mail'];
					echo "\t Mot de Passe : ";
					echo $donnees['mdp'];
				}
				
				////
	
			?>	
	
</body>