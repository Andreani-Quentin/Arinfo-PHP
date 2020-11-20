<?php

	try 
	{
        $pdo = new PDO('mysql:host=localhost;dbname=minichat;port=3306', 'root', '0f78dhch');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	if(!empty($_POST)) 
	{
		$pseudo = $_POST["pseudo"];
		$message = $_POST["message"];
	}

	$sth = $pdo->prepare('INSERT INTO users(pseudo, message) 
						  VALUES(:pseudo, :message)');
	$sth->execute(array(
					':pseudo' => $pseudo,
                	':message' => $message,));

	header('Location: index.php');
?>