<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Classe</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/50b4ed0339.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<section class="container shadow my-5 p-5 bg-dark">
			<div class="row">
				<div class="col-md-6">
				<h1>Classe de <?php echo $_GET["nom_classe"]?></h1>
				</div>
				<div class="col-md-6 text-right">
					<a href="index.php">Retourner à la page d'accueil</a>
				</div>
			</div>
			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<th>Nom Élève</th>
						<th>Prenom Élève</th>
						<th>Date de Naissance Élève</th>
					</tr>
				</thead>
				<?php
				try
				{
					$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch');
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			        /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
			        *users pour chaque entrée de la table*/
			        
			        $id = $_GET["id_classe"];
			        $sth = $pdo->prepare("SELECT * FROM eleves WHERE classe_eleve = ". $id);
			        $sth->execute();

			        /*Retourne un tableau associatif pour chaque entrée de notre table
			        *avec le nom des colonnes sélectionnées en clefs*/
			        $resultat = $sth->fetchAll();

			        /*J'affiche mes données*/
			        foreach ($resultat as $key => $value) 
			        { ?>	
			            <tbody>
			               	<tr>
			               		<td><?php echo $value['nom_eleve']?></td>
			               		<td><?php echo $value['prenom_eleve'];?></td>
			               		<td><?php echo $value['date_naissance_eleve'];?></td>
			               	</tr>

			        <?php }
			    }

			    catch(PDOException $e)
			        {
			            echo "Erreur : " . $e->getMessage();
			      	} ?>
			            </tbody>
			</table>
			<div class="row">
			    <div class="form_box">
			        <form action="update_classe_form.php" method="post">
			           	<input type="text" name="nom" placeholder="Nouveau nom de classe">
			           	<input type="hidden" name ="id_classe" value="<?php echo $id?>">
			           	<input type="submit" value="Valider" name="submit">
			        </form>
				</div>
			</div>
		</section>

		       <!------------------------------ SCRYPT ------------------------------->

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>