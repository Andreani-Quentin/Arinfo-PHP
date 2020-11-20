<?php
    try 
    {
        $pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '0f78dhch',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST))
        {
            $idVoiture = $_POST['idVoiture'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
        }

        $sth = $pdo->prepare("
            INSERT INTO clients(idVoiture,nom,prenom)
            VALUES (:idVoiture, :nom, :prenom)");

        $sth->execute(array(
            ':idVoiture' => $idVoiture,
            ':nom' => $nom,
            ':prenom' => $prenom));
    }

    catch (PDOException $e) 
    {
        echo "Erreur : " . $e->getMessage();
    }

    header('Location: index.php');
?>