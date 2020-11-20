<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TP Location de Voiture</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/50b4ed0339.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<section class="container">
			<h1>TP - Location de Voitures</h1>
			<div class="row">
				<div class="form_box">
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<input type="text" name="immatriculation" placeholder="Entrez l'immatriculation">
						<input type="text" name="marque" placeholder="Entrez la marque">
						<input type="text" name="modele" placeholder="Entrez le modèle">
						<input type="text" name="annee" placeholder="Entrez l'année de mise en circulation">
						<input type="file" name="fileToUpload" id="fileToUpload">
	  					<input type="submit" value="Valider" name="submit">
					</form>
				</div>
			</div>
		</section>

		<section class="container">
			<div class="row my-5 car_box">
				<?php
	          
	           		try
	           		{
	                   	$pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '0f78dhch');
		               	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		              
		               	/*Sélectionne les valeurs dans les colonnes prenom et mail de la table
		                *users pour chaque entrée de la table*/
		               	$sth = $pdo->prepare("SELECT * FROM voitures");
		               	$sth->execute();
		              
		               	/*Retourne un tableau associatif pour chaque entrée de notre table
		                *avec le nom des colonnes sélectionnées en clefs*/
		               	$resultat = $sth->fetchAll();

	                   	/*J'affiche mes données*/
	                   	foreach ($resultat as $key => $value) 
	                   	{
	            ?>	
	            			<div class="col-md-6 car_img" style="background-image: url(<?php echo $value['image']?>); background-position: center; background-size: cover;">
	            			</div>
	            			<div class="col-md-6 car_info">
	            				<p>Immatriculation : <?php echo $value['immatriculation']?></p>
	            				<p>Marque : <?php echo $value['marque'];?></p>
	            				<p>Modèle : <?php echo $value['modele'];?></p>
	            				<p>Année : <?php echo $value['annee'];?></p>
	            				
	            			</div>
	            <?php
	                   	}
	           		}
	                
	           		catch(PDOException $e)
	           		{
	               		echo "Erreur : " . $e->getMessage();
	           		}
	       		?>
			</div>
		</section>

		<section class="container">
			<div class="row">
				<div class="form_client">
					<form action="client.php" method="post">
						<input type="text" name="nom" placeholder="Entrez le nom">
						<input type="text" name="prenom" placeholder="Entrez le prenom">
						<select name="idVoiture">
							<option value="" disabled selected>Choix de la voiture</option>
							<?php
								
								foreach ($resultat as $key => $value)
								{ ?>

									<option value="<?php echo $value['idVoiture'];?>">
										<?php echo $value['marque']." ".$value['modele'];?>
									</option>
								<?php } ?>
						</select>
						<input type="submit" name ="submit" value="Valider">
					</form>
				</div>
			</div>
		</section>

		<section>
			<div class="row my-5 car_box">
				<?php
	           		try
	           		{
	                   	$pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '0f78dhch');
		               	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		              
		               	/*Sélectionne les valeurs dans les colonnes prenom et mail de la table
		                *users pour chaque entrée de la table*/
		               	$sth = $pdo->prepare('SELECT nom, prenom, marque, modele, annee, image, immatriculation, DATE_FORMAT(dateLocation, \'%d/%m/%Y à %Hh%imin%ss\') AS dateLocation_fr FROM clients INNER JOIN voitures ON voitures.idVoiture = clients.idVoiture');
		               	$sth->execute();
		              
		               	/*Retourne un tableau associatif pour chaque entrée de notre table
		                *avec le nom des colonnes sélectionnées en clefs*/
		               	$resultat = $sth->fetchAll();

	                   	/*J'affiche mes données*/
	                   	foreach ($resultat as $key => $value) 
	                   	{
	            ?>			
	            			<div class="col-md-6 car_info">
	            				<p>Nom du locataire : <?php echo $value['nom'];?></p>
	            				<p>Prénom du locataire : <?php echo $value['prenom'];?></p>
	            				<p>Immatriculation : <?php echo $value['immatriculation'];?></p>
	            				<p>Marque : <?php echo $value['marque'];?></p>
	            				<p>Modèle : <?php echo $value['modele'];?></p>
	            				<p>Année : <?php echo $value['annee'];?></p>
	            				<p>Date de Location : <?php echo $value['dateLocation_fr'];?></p>
	            			</div>
	            			<div class="col-md-6 car_img" style="background-image: url(<?php echo $value['image']?>); background-position: center; background-size: cover;">
	            				
	            			</div>
	            <?php
	                   	}
	           		}
	                
	           		catch(PDOException $e)
	           		{
	               		echo "Erreur : " . $e->getMessage();
	           		}
	       		?>
		</section>

		<!------------------------------ SCRYPT ------------------------------->

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>