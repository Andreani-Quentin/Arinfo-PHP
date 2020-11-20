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
		$auteur = $_POST["auteur"];
		$commentaire = $_POST["commentaire"];
		$idPost = $_POST["idPost"];
		var_dump($idPost);
	}

	$sth = $pdo->prepare('INSERT INTO commentaires(auteur, commentaire, idPost) 
						  VALUES(:auteur, :commentaire, :idPost)');
	$sth->execute(array(
					':auteur' => $auteur,
                	':commentaire' => $commentaire,
                	':idPost' => $idPost,));

	header("Location: commentaires.php?posts=".$_POST['idPost']);
?>