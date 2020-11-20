<?php
    $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS `classe` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);

    try
    {
        $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

            $sql = "CREATE TABLE `classe`.`eleves` (
            `id_eleve` INT NOT NULL AUTO_INCREMENT , 
            `nom_eleve` VARCHAR(50) NOT NULL ,
            `prenom_eleve` VARCHAR(50) NOT NULL ,
            `classe_eleve` VARCHAR(50) NOT NULL ,
            `date_naissance_eleve` DATE,
             PRIMARY KEY (`id_eleve`)) ENGINE = InnoDB";

            $pdo->exec($sql);

            $sql = "CREATE TABLE `classe`.`professeur` (
            `id_professeur` INT NOT NULL AUTO_INCREMENT , 
            `nom_professeur` VARCHAR(50) NOT NULL ,
            `prenom_professeur` VARCHAR(50) NOT NULL ,
            `classe_professeur` VARCHAR(50) NOT NULL , 
             PRIMARY KEY (`id_professeur`)) ENGINE = InnoDB";

            $pdo->exec($sql);

            $sql = "CREATE TABLE `classe`.`classes` (
            `id_classe` INT NOT NULL AUTO_INCREMENT , 
            `nom_classe` VARCHAR(50) NOT NULL ,
            `nom_professeur` VARCHAR(50) NOT NULL ,
             PRIMARY KEY (`id_classe`)) ENGINE = InnoDB";

            $pdo->exec($sql);

            $sql = "CREATE TABLE `classe`.`users` (
            `id` INT NOT NULL AUTO_INCREMENT , 
            `pseudo` VARCHAR(50) NOT NULL ,
            `pass` VARCHAR(50) NOT NULL ,
             PRIMARY KEY (`id`)) ENGINE = InnoDB";

            $pdo->exec($sql);

            echo 'Félicitations, la table a bien été créée !';
    }
    
    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>