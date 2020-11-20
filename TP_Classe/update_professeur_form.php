<?php
	try 
	{
		$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if(!empty($_POST))
        {
            $nom_professeur = strval($_POST['nom']);
            $prenom_professeur = strval($_POST['prenom']);
            $classe_professeur = strval($_POST['id_classe']);
            $id_professeur = strval($_POST["id_professeur"]);
        }

		$sth = $pdo->prepare("
			UPDATE professeur
			SET nom_professeur=:nom_professeur, prenom_professeur=:prenom_professeur, classe_professeur=:classe_professeur
			WHERE id_professeur=$id_professeur ");

		$sth->execute(array(
            ':nom_professeur' => $nom_professeur,
        	':prenom_professeur' => $prenom_professeur,
        	':classe_professeur' => $classe_professeur));

        //On affiche le nombre d'entrées mise à jour
		$count = $sth->rowCount();
		print('Mise à jour de ' .$count. ' entrée(s)');
	}

	catch (PDOException $e) 
	{
		echo "Erreur : " . $e->getMessage();
	}
	header('Location: update_professeur.php?id_professeur='.$id_professeur);
?>