<?php
	try 
	{
		$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if(!empty($_POST))
        {
            $nom = strval($_POST['nom']);
            $id_classe = strval($_POST["id_classe"]);
        }

		$sth = $pdo->prepare("
			UPDATE classes
			SET nom_classe=:nom
			WHERE id_classe=$id_classe ");

		$sth->execute(array(
            ':nom' => $nom));

        //On affiche le nombre d'entrées mise à jour
		$count = $sth->rowCount();
		print('Mise à jour de ' .$count. ' entrée(s)');
	}

	catch (PDOException $e) 
	{
		echo "Erreur : " . $e->getMessage();
	}
	header('Location: update_classe.php?id_classe='.$id_classe);
?>