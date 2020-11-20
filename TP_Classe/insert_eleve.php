<?php
    try 
    {
        $pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST))
        {
            $nom_eleve = $_POST['nom_eleve'];
            $prenom_eleve = $_POST['prenom_eleve'];
            $date_naissance = $_POST['date_naissance_eleve'];
            $classe_eleve = $_POST['id_classe'];
        }

        $sth = $pdo->prepare("
            INSERT INTO eleves(nom_eleve,prenom_eleve,classe_eleve, date_naissance_eleve)
            VALUES (:nom_eleve, :prenom_eleve, :classe_eleve, :date_naissance_eleve)");

        $sth->execute(array(
            ':nom_eleve' => $nom_eleve,
            ':prenom_eleve' => $prenom_eleve,
            ':classe_eleve' => $classe_eleve,
            ':date_naissance_eleve' => $date_naissance));
    }

    catch (PDOException $e) 
    {
        echo "Erreur : " . $e->getMessage();
    }

    header('Location: index.php');
?>