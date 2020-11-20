<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>

	<body>
		<p> <-------------- Exercice 2 ---------------> </P>
		<?php
			$tableau = array( 'nom' => 'Nantes', 'langue' => 'Français', 'devise' => 'Euros', 'population' => '67000000', 'capital' => 'Paris');
		?>
		<table border=4 cellspacing=4 cellpadding=4 width=80%>
			<tr>
				<td>Clef</td>
				<td>Valeurs</td>
			</tr>
			<?php 
				foreach($tableau as $clef => $valeurs) {
					echo "<tr><td>$clef</td> <td>$valeurs</td></tr> <br>";
				}
			?>
		</table>

		<p> <-------------- Exercice 3 ---------------> </P>

		<?php
			function heure($heure) {

				if (($heure >= 12) && ($heure < 18))
					echo "Après-midi";

				elseif (($heure >= 18) && ($heure < 24))
					echo "Soir";

				elseif (($heure >= 0) && ($heure < 6))
					echo "Nuit";

				elseif (($heure >= 6) && ($heure < 12))
					echo "Matin";
				echo "<br>";
			}

			$h = heure(4);
		?>

		<p> <-------------- Exercice 4 ---------------> </P>

		<?php 
			function age($age){
				
				if ($age > 18) 
				{
					echo "Vous êtes majeur";
				}
				elseif (($age < 18) && ($age > 0)) 
				{
					echo "Vous êtes mineur";
				}
				echo "<br>";
			}
			$age = age(22);
		?>

		<p> <-------------- Exercice 5 ---------------> </P>

		<?php 
			function choix($choix){
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
				echo "<br>";
			}
			$C = choix(1);
		?>

		<p> <-------------- Exercice 6 ---------------> </P>

		<?php
			function multiple($nbr) 
			{
				if (($nbr % 3 == 0) && ($nbr % 5 == 0))
				{
					echo "$nbr est multiple de 3 et 5";
				} 
				else 
				{
					echo "$nbr n'est pas multiple de 3 et 5";
				}
				echo "<br>";
			}
			$num = multiple(22);
		?>

		<p> <-------------- Exercice 7 ---------------> </P>

		<?php
		function prixTTC($prixHT) 
		{
			$prixTTC = ($prixHT / 100 * 20) + $prixHT;
			echo "Le prix hors taxe est $prixHT et le prix TTC est $prixTTC <br>";
		}
		$Prix = prixTTC(10);
		?>

		<p> <-------------- Exercice 8 ---------------> </P>

		<?php
			function convert($euro){
				echo "$euro Euros vaut : <br>";
				$couronneNOR = $euro * 11.1004;
				echo "$couronneNOR Kr Norvegienne <br>";
				$yuan = $euro * 7.8070;
				echo "$yuan Yuan Chinois <br>";
				$yen = $euro * 122.0536;
				echo "$yen Yen Japonais <br>"; 
			}
			$euros = convert(56);
		?>
	</body>
</html>