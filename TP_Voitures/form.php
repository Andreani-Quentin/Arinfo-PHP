<?php
	try 
	{
		$pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '0f78dhch');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if(!empty($_POST))
		{
			$immatriculation = $_POST['immatriculation'];
			$marque = $_POST['marque'];
			$modele = $_POST['modele'];
			$annee = $_POST['annee'];
		}

	            //$sth appartient à la classe PDOStatement
		$sth = $pdo->prepare("
			INSERT INTO voitures(immatriculation,marque,modele,annee)
			VALUES (:immatriculation, :marque, :modele, :annee)");

		$sth->execute(array(
			':immatriculation' => $immatriculation,
			':marque' => $marque,
			':modele' => $modele,
			':annee' => $annee));

		echo "Entrée ajoutée dans la table";
	}

	catch (PDOException $e) 
	{
		echo "Erreur : " . $e->getMessage();
	}

	//header('Location: index.php');
?>