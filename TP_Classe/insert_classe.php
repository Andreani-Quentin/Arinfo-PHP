<?php
    try 
    {
        $pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST))
        {
            $nom_classe = $_POST['nom_classe'];
        }

        $sth = $pdo->prepare("
            INSERT INTO classes(nom_classe)
            VALUES (:nom_classe)");

        $sth->execute(array(
            ':nom_classe' => $nom_classe));
    }

    catch (PDOException $e) 
    {
        echo "Erreur : " . $e->getMessage();
    }

    header('Location: index.php');
?>