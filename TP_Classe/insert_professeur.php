<?php
    try 
    {
        $pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST))
        {
            $nom_professeur = $_POST['nom_professeur'];
            $prenom_professeur = $_POST['prenom_professeur'];
            $classe_professeur = $_POST['id_classe'];
        }

        $sth = $pdo->prepare("
            INSERT INTO professeur(nom_professeur,prenom_professeur,classe_professeur)
            VALUES (:nom_professeur, :prenom_professeur, :classe_professeur)");

        $sth->execute(array(
            ':nom_professeur' => $nom_professeur,
            ':prenom_professeur' => $prenom_professeur,
            ':classe_professeur' => $classe_professeur));
    }

    catch (PDOException $e) 
    {
        echo "Erreur : " . $e->getMessage();
    }

    header('Location: index.php');
?>