<?php
    $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);

    try
    {
        $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

            $sql = "CREATE TABLE `blog`.`posts` (
            `id` INT NOT NULL AUTO_INCREMENT , 
            `titre` VARCHAR(100) NOT NULL , 
            `contenu` TEXT(500) NOT NULL , 
            `datePost` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

            $pdo->exec($sql);

            $sql = "CREATE TABLE `blog`.`commentaires` (
            `id` INT NOT NULL AUTO_INCREMENT , 
            `idPost` INT(5) NOT NULL ,
            `auteur` VARCHAR(100) NOT NULL , 
            `commentaire` TEXT(100) NOT NULL , 
            `dateCommentaire` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

            $pdo->exec($sql);

            echo 'Félicitations, la table a bien été créée !';

    }
    
    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>