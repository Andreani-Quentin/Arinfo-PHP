<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Exercice PHP 3</title>
	</head>

	<body>

		<p> <-------------- Exercice 1 ---------------> </P>

		<?php
			function increment($incre)
			{
				for($i = $incre; $i < 100; $i= $i + $incre)
				{
					echo "$i,";
				}
			}
			$resultat = increment(3);
		?>

		<p> <-------------- Exercice 2 ---------------> </P>

		<?php

				function multiple($nbr) 
				{
					if (($nbr % 3 == 0) && ($nbr % 4 == 0) && ($nbr%2 == 1))
					{
						echo "$nbr est multiple de 3 et 4 et il est impair";
					} 
					else if (($nbr % 3 == 0) && ($nbr % 4 == 0))
					{
						echo "$nbr est multiple de 3 et 4 et il est pair";
					} 
					else if ($nbr%2 == 1)
					{
						echo "$nbr n'est pas multiple de 3 et 4 et il est impair";
					}
					else
					{
						echo "$nbr n'est pas multiple de 3 et 4 et il est paire";
					}
					echo "<br>";
				}
			$num = multiple(24);
		?>
		
		<p> <-------------- Exercice 3 ---------------> </P>

		<?php
			function air($L, $l)
			{
				echo "La Largeur est de $L <br>";
				echo "La longueur est de $l <br>";
				$air = $L * $l;
				echo "Donc l'air du rectangle est $air";
			}
			air(3, 4);
		?>

		<p> <-------------- Exercice 4 ---------------> </P>

		<?php
				global $a;
				global $b;
				global $c;
				global $d;

				while ($d != 10) 
				{
					$a = rand(0, 9);
					$b = rand(0, 9);
					$c = rand(0, 9);
					$d = $a + $b + $c;
				}
				echo "$a + $b + $c = $d"
		?>

		<p> <-------------- Exercice 5 ---------------> </P>

		<?php
			for($i = 0; $i <= 100; $i++)
			{
				$a = sqrt($i);
				if($a == (is_int($a)))
				{
					echo "$a <br>";
				}
			}
		?>

		<p> <-------------- Exercice 6 ---------------> </P>

		<?php
			function Fibonacci($n)
			{ 
		      
		        $nbr1 = 0; 
		        $nbr2 = 1; 
		      
		        $counter = 0; 
		        while ($counter < $n){ 
		            echo ' '.$nbr1;
		            $nbr3 = $nbr2 + $nbr1; 
		            $nbr1 = $nbr2; 
		            $nbr2 = $nbr3; 
		            $counter = $counter + 1; 
		        } 
		    }
		    Fibonacci(50);
	    ?>
	    
	    <p> <-------------- Exercice 7 ---------------> </P>

	    <?php
			
			setlocale(LC_TIME, 'fr_FR');
	    	date_default_timezone_set('europe/paris');
			 
			echo strftime('%Y-%m-%d %H:%M:%S <br>');
			echo strftime('%A %d %B %Y, %H:%M <br>');
			echo strftime('%d %B %Y <br>');        
			echo strftime('%d/%m/%y <br>');           
		?>

		<p> <-------------- Exercice 8 ---------------> </P>
			<?php
				$tableau = array( 'H' => 'Hydrogène', 'He' => 'Helium', 'Li' => 'Lythium', 'Be' => 'Beryllium', 'B' => 'Bore', 'C' => 'Carbone', 'N' => 'Azote', 'O' => 'Oxygène', 'F' => 'Fluor', 'Ne' => 'Neon');
			?>
			<table border=1 width=20%>
				<tr>
					<td>Symbole</td>
					<td>Élément</td>
				</tr>
				<?php 
					foreach($tableau as $clef => $valeurs) {
						echo "<tr><td>$clef</td> <td>$valeurs</td></tr> <br>";
					}
				?>
			</table>

		<p> <-------------- Exercice 9 ---------------> </P>
			<?php
				$tab=array(
					"Dupont" => array("prenom" => "Paul", "ville" => "Paris", "age" => 27),
					"Schmoll" => array("prenom" => "Kirk", "ville" => "Berlin", "age" => 35),
					"Smith" => array("prenom" => "Stan", "ville" => "Londres", "age" => 45));

				// echo $tab["Dupont"]["prenom"];

				foreach ($tab as $tab) {
				    echo $tab["prenom"];
				    echo " ";
				    echo $tab["ville"];
				    echo " ";
				    echo $tab["age"];
				    echo "<br>";
				}
			?>
			
	</body>
</html>