<?php
    $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS `minichat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);

    //catch (PDOException $e)
    //{
      //  print "Erreur !: " . $e->getMessage() . "<br/>";
        //die();
    //}

    try
    {
        $pdo = new PDO('mysql:host=localhost;','root','0f78dhch');
        // $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

            $sql = "CREATE TABLE `minichat`.`users` (
            `Id` INT NOT NULL AUTO_INCREMENT , 
            `pseudo` VARCHAR(100) NOT NULL , 
            `message` TEXT(100) NOT NULL , 
            `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

            $pdo->exec($sql);

            echo 'Félicitations, la table a bien été créée !';

    }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
?>
