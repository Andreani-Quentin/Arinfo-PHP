<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>

	<body>
		<p> <-------------- Exercice 1 ---------------> </P>
		<?php
			$nom = "Martin";
			$anneeNaissance = 2000;
			$age = 2015 - $anneeNaissance;
			echo "Bonjour Mr". " ". $nom. " ". "vous avez". " ". $age. " ". "ans". "<br>"
		?>

		<p> <-------------- Exercice 2 ---------------> </P>

		<?php
			$note_maths = 15;
			$note_français = 12;
			$note_HG = 9;
			$moyenne = ($note_maths + $note_français + $note_HG) / 3;
			echo "La moyenne est de". " ". $moyenne. "/20". "<br>"
		?>
		
		<p> <-------------- Exercice 3 ---------------> </P>

		<?php
			$sexe = 15;
			if ($sexe > 10)
				echo "Homme";
			else 
				echo "Femme";
			echo "<br>"
		?>

		<p> <-------------- Exercice 4 ---------------> </P>

		<?php
			$heure = 4;
			if (($heure >= 12) && ($heure < 18))
				echo "Après-midi";

			elseif (($heure >= 18) && ($heure < 24))
				echo "Soir";

			elseif (($heure >= 0) && ($heure < 6))
				echo "Nuit";

			elseif (($heure >= 6) && ($heure < 12))
				echo "Matin";
			echo "<br>"
		?>

		<p> <-------------- Exercice 5 ---------------> </P>

		<?php 
			$age = 22;
			if ($age > 18) 
			{
				echo "Vous êtes majeur";
			}
			elseif (($age < 18) && ($age > 0)) 
			{
				echo "Vous êtes mineur";
			}
			echo "<br>"
		?>

		<p> <-------------- Exercice 6 ---------------> </P>

		<?php 
			$choix = 2;

			switch ($choix) 
			{
				case 1:
        			echo "Insérer";
        			break;

    			case 2:
        			echo "Supprimer";
        			break;

    			case 3:
        			echo "Afficher";
        			break;

        		case 4:
        			echo "Ce choix n'existe pas";
        			break;

        		default:
        			echo "Choix";
        			break;
			}
			echo "<br>"
		?>

		<p> <-------------- Exercice 7 ---------------> </P>

		<?php 
			$nbr = 15;
			if (($nbr % 3 == 0) && ($nbr % 5 == 0))
			{
				echo "$nbr est multiple de 3 et 5";
			} 
			else 
			{
				echo "$nbr n'est pas multiple de 3 et 5";
			}
			echo "<br>";
		?>

		<p> <-------------- Exercice 8 ---------------> </P>

		<?php
			$prixHT = 20;
			$prixTTC = ($prixHT / 100 * 20) + $prixHT;
			echo "Le prix hors taxe est $prixHT et le prix TTC est $prixTTC <br>";
		?>

		<p> <-------------- Exercice 9 ---------------> </P>

		<?php
			$euro = 14;
			echo "$euro Euros vaut : <br>";
			$couronneNOR = $euro * 11.1004;
			echo "$couronneNOR Kr Norvegienne <br>";
			$yuan = $euro * 7.8070;
			echo "$yuan Yuan Chinois <br>";
			$yen = $euro * 122.0536;
			echo "$yen Yen Japonais <br>"; 
		?>

		<p> <-------------- Exercice 10 ---------------> </P>

		<?php

			$age = 26;
			$sexe = 2;

			if ($sexe = 1){
				$Homme = $sexe;
			}
			else if ($sexe = 2) {
				$Femme = $sexe;
			}

			if (($Femme = $sexe) && ($age >= 18 && $age <35))
			{
				echo "Bienvenue Madame, vous avez $age ans donc eligible à notre programme.";
			} 
			else 
			{
				echo "01010101001010101010101010101010101010101010";
			}
			echo "<br>";
		?>

		<p> <-------------- Exercice 11 ---------------> </P>

		<?php
			$codePostal = 44000;
			while ($codePostal < 45000) {
				echo $codePostal. "<br>";
				$codePostal = $codePostal + 100;
			}
		?>

		<p> <-------------- Exercice 12 ---------------> </P>

		<?php
			$nbr = 5;
			$num = 1;
			for ($i = 0; $i < $nbr; $i++)
			{
				for ($j = 0; $j <= $i; $j++)
				{
					echo $num." ";
				}
				$num = $num + 1;
				echo "<br>";
			}
		?>

		<p> <-------------- Exercice 13 ---------------> </P>

		<?php
			$nbr = 20;
			$i = 0;
			while ($i <= $nbr)
			{
				if ($i == 10)
				{
					echo "<h1>". $i. "</h1>";
				}
				else if ($i != 10)
				{
					echo $i;
				}
				$i = $i + 2;
				echo "<br>";
			}
		?>

		<p> <-------------- Exercice 14 ---------------> </P>

		<?php
			function est_pair($num) 
			{
				if ($num % 2 == 0)
				{
					return true;
				}
				else 
				{
					return false;
				}
			}

			$nbr = rand(0, 100);
			if (est_pair($nbr))
			{
				echo "$nbr est pair !"; 
			}
			else 
			{
				echo "$nbr est impair !";
			}
		?>

		<p> <-------------- Exercice 14 SUITE ---------------> </P>

		<?php
			global $a;
			global $b;
			global $c;

			while (($a % 2 != 0) || ($b % 2 != 1) || ($c % 2 != 1)) {
				$a = rand(0, 100);
				$b = rand(0, 100);
				$c = rand(0, 100);
				echo "Les chiffres sont : $a, $b, $c". "<br>";
			}

		?>

		<p> <-------------- Exercice 15 WHILE ---------------> </P>

		<?php
			$nbr = 123;
			$compteur = 0;
			
			while ($i != $nbr) {
				$i = rand(0, 200);
				echo $i. "<br>";
				$compteur++;
			}
			echo "Le chiffre est $i <br>";
			echo "Nombre de coups : $compteur";
		?>

		<p> <-------------- Exercice 15 FOR ---------------> </P>

		<?php
			$nbr = 150;
			$compteur = 0;
			
			for ($compteur = 0; $i != $nbr; $compteur++) {
				$i = rand(0, 200);
				echo $i. "<br>";
			}
			echo "Le chiffre est $i <br>";
			echo "Nombre de coups : $compteur";
		?>		

	</body>
</html>
