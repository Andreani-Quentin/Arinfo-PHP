<?php
    try
    {
	$pdo = new PDO('mysql:host=localhost;dbname=blog;port=3306', 'root', '0f78dhch');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
                    $sql1 = "INSERT INTO commentaires(commentaire)
                           VALUES('idPost')";
                    $pdo->exec($sql1);
                    echo 'Entrées ajoutées dans la table';
    }
    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>