<?php
	try 
	{
		$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if(!empty($_POST))
        {
            $nom_eleve = strval($_POST['nom']);
            $prenom_eleve = strval($_POST['prenom']);
            $classe_eleve = strval($_POST['id_classe']);
            $id_eleve = strval($_POST["id_eleve"]);
        }

		$sth = $pdo->prepare("
			UPDATE eleves
			SET nom_eleve=:nom_eleve, prenom_eleve=:prenom_eleve, classe_eleve=:classe_eleve
			WHERE id_eleve=$id_eleve ");

		$sth->execute(array(
            ':nom_eleve' => $nom_eleve,
        	':prenom_eleve' => $prenom_eleve,
        	':classe_eleve' => $classe_eleve));

        //On affiche le nombre d'entrées mise à jour
		$count = $sth->rowCount();
		print('Mise à jour de ' .$count. ' entrée(s)');
	}

	catch (PDOException $e) 
	{
		echo "Erreur : " . $e->getMessage();
	}
	header('Location: update_eleve.php?id_eleve='.$id_eleve);
?>