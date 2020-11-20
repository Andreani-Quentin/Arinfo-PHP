<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Exemple de formulaire</title>
	</head>
	<body>

		<p><-------------- Exercice 1 ---------------></P>

		<form action="script.php" method="post">
			<label>Nom</label>
			<input name="nom" type="text">
			<label>Prénom</label>
			<input name="prenom" type="text">
			<input type="submit" value="envoyer">
		</form>
		<?php
			$nom = isset($_POST['nom']);
			$prenom = isset($_POST['prenom']);

			echo "Bijour missié $nom, vous avez trop la classe $prenom";
		?>

		<p><-------------- Exercice 2 ---------------></P>

		<?php
	  		echo "L'adresse IP de l utilisateur est : ". $_SERVER['REMOTE_ADDR']. "<br>";
	  		echo "Le nom du fichier dans lequel nous sommes est : ". basename (__FILE__, '.php'). ".php";
		?>

		<p><-------------- Exercice 3 ---------------></P>

		<?php 
			$tableau = array('Salaire de Mr B' => '1520€', 'Salaire de Mr T' => '1680€', 'Salaire de Mr X' => '2150€');
		?>
		<table border=1 width=20%>
			
			<?php
				foreach($tableau as $clef => $valeurs) 
				{
					echo "<tr><td>$clef</td> <td>$valeurs</td></tr> <br>";
				}
			?>
		</table>

		<p><-------------- Exercice 4 ---------------></P>

		<?php
			
			setlocale(LC_TIME, 'fr_FR');
	    	date_default_timezone_set('europe/paris');
			 
			echo strftime('%Y-%m-%d <br>');
			echo strftime('%A %d %B %Y <br>');
			echo strftime('%d %B %Y <br>');        
			echo strftime('%d/%m/%y <br>');
			echo strftime('%d.%m.%y <br>');            
		?>

		<?php
			setlocale(LC_TIME, 'fr_FR');
	    	date_default_timezone_set('europe/paris');

	    	$p = strftime('%Y-%m-%d');

			$origin = new DateTime("$p");
			$target = new DateTime('2021-06-23');
			$interval = $origin->diff($target);
			echo $interval->format('%R%a jours');
		?>

		<p><-------------- Exercice 5 ---------------></P>

		<?php
			$tab = array(rand(0, 20), rand(0, 20), rand(0, 20), rand(0, 20), rand(0, 20), rand(0, 20), rand(0, 20), rand(0, 20), rand(0, 20), rand(0, 20));
			foreach($tab as $clef => $valeurs) 
			{
				echo $valeurs. "<br>";
			}

			$max = get_max_number($tab);
        	echo "Le nombre le plus élevé est $max <br>";
			function get_max_number($tab)
			{
				$size = sizeof($tab);
				$max = $tab[0];
				for ($i = 0; $i < $size - 1; $i++)
					if ($tab[$i] < $tab[$i + 1] && $tab[$i + 1] > $max)
						$max = $tab[$i + 1];
				return $max;
			} 

			$min = get_min_number($tab);
        	echo "Le nombre le plus faible est $min";
			function get_min_number($tab)
			{
				$size = sizeof($tab);
				$min = $tab[0];
				for ($i = 0; $i < $size - 1; $i++)
					if ($tab[$i] > $tab[$i + 1] && $tab[$i + 1] < $min)
						$min = $tab[$i + 1];
				return $min;
			}        
		?>

		<p> <-------------- Exercice 6 ---------------> </P>

		<?php
			$a = sqrt(77);
			echo "La racine carrée de 77 arrondie est : ";
			echo round($a);		
		?>

		
	</body>
</html>