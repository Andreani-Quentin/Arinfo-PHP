<?php
	function de($nbJet, $nbFaces) 
	{
		$result = 0;
		for ($i = 1; $i <= $nbJet; $i++) 
		{
			$de = rand(1, $nbFaces);
			echo "Le lancer Nº $i est $de <br>";
			$result = $result + $de;
		}
	}

	function deTotal($nbJet, $nbFaces) 
	{
		$result = 0;
		for ($i = 1; $i <= $nbJet; $i++) 
		{
			$de = rand(1, $nbFaces);
			$result = $result + $de;
		}
		echo "<span class='total'>TOTAL</span><br><div class='result'>$result</div>";
	}
?>