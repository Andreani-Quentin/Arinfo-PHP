<?php
    $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS `location` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);

    try
    {
        $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

            $sql = "CREATE TABLE `location`.`voitures` (
            `idVoiture` INT NOT NULL AUTO_INCREMENT , 
            `immatriculation` VARCHAR(100) NOT NULL ,
            `marque` VARCHAR(100) NOT NULL ,
            `modele` VARCHAR(100) NOT NULL ,
            `annee` INT(5) NOT NULL ,
            `image` VARCHAR(100) NOT NULL,
             PRIMARY KEY (`idVoiture`)) ENGINE = InnoDB";

            $pdo->exec($sql);

            $sql = "CREATE TABLE `location`.`clients` (
            `idClient` INT NOT NULL AUTO_INCREMENT , 
            `idVoiture` INT(5) NOT NULL ,
            `nom` VARCHAR(100) NOT NULL , 
            `prenom` VARCHAR(100) NOT NULL , 
            `dateLocation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
             PRIMARY KEY (`idClient`)) ENGINE = InnoDB";

            $pdo->exec($sql);

            echo 'Félicitations, la table a bien été créée !';
    }
    
    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>