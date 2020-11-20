<?php
	require "de.php";
	if(!empty($_POST)) 
	{
		$nbJet = $_POST["lancer"];
		$nbFaces = $_POST["faces"];
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Exemple de formulaire</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body>
		<section>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 center">
					<h1 class="shadow">Minimal dice style</h1>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row my-5">
				<div class="col-md-4"></div>
				<div class="col-md-4 p-5 shadow bouton">
					<div class="form_box text-center">
						<form method="post" action="index.php">
							<input class="form-control text-center" type="text" name="faces" placeholder="Entrer le nombre de faces ici ..."><br>
							<input class="form-control text-center" type="text" name="lancer" placeholder="Et ici le nombre de lancés"><br>
							<button class="btn_perso" type="submit">Envoyer</button><br><br>
							<div class="refresh"><a href="index.php">Refresh</a></div>
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</section>

		<div class="row">
			<div class="col-md-12">
				<div class="text-center resultat shadow">
					<?php
						if (!empty($_POST))
						{
							deTotal($nbJet, $nbFaces);
							de($nbJet, $nbFaces);
						}
					?>
				</div>
			</div>
		</div>

		<footer class="footer">
			<p>
				Copyright - Andreani Quentin
			</p>
		</footer>
		<!------------------------------ SCRYPT ------------------------------->

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>