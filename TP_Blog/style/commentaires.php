<?php

	try 
	{
        $pdo = new PDO('mysql:host=localhost;dbname=blog;port=3306', 'root', '0f78dhch');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	if(!empty($_POST)) 
	{
		$commentaire = $_POST["commentaire"];
	}

	$sth = $pdo->prepare('INSERT INTO commentaires(commentaire) 
						  VALUES(:commentaire)');
	$sth->execute(array(
					':commentaire' => $commentaire,));

	header('Location: index.php');
?>