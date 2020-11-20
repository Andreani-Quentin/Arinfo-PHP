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
		$titre = $_POST["titre"];
		$contenu = $_POST["contenu"];
	}

	$sth = $pdo->prepare('INSERT INTO posts(titre, contenu) 
						  VALUES(:titre, :contenu)');
	$sth->execute(array(
					':titre' => $titre,
                	':contenu' => $contenu,));

	header('Location: index.php');
?>