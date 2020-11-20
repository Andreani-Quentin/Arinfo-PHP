<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mise à jour des Professeurs</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/50b4ed0339.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<section class="container">
			<div class="row my-5">
				<div class="col-md-6">
				<h1>Modification de Professeur</h1>
				</div>
				<div class="col-md-6 text-right">
					<a href="index.php">Retourner à la page d'accueil</a>
				</div>
			</div>
			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<th>Nom du professeur</th>
						<th>Prénom du professeur</th>
						<th>Classe du professeur</th>
					</tr>
				</thead>
				<?php
				try
					{
						$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch');
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$id = $_GET["id_professeur"];

			            $sth = $pdo->prepare("SELECT id_professeur, nom_professeur, prenom_professeur, nom_classe FROM professeur INNER JOIN classes ON classes.id_classe = professeur.classe_professeur WHERE id_professeur = '$id' ");
			            $sth->execute();

			            $resultat = $sth->fetchAll();

			            foreach ($resultat as $key => $value) 
			            {?>	
							<tbody>
			               		<tr>
			               			<td><?php echo $value['nom_professeur']?></td>
			               			<td><?php echo $value['prenom_professeur'];?></td>
			               			<td><?php echo $value['nom_classe'];?></td>
			               			<td>
			               				<a href="delete_professeur.php?id_professeur=<?php echo $value['id_professeur'];?>">Supprimer</a>
			               			</td>
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
			        <form action="update_professeur_form.php" method="post">
			           	<input type="text" name="nom" placeholder="Nouveau nom du professeur">
			           	<input type="text" name="prenom" placeholder="Nouveau prenom du professeur">
			           	<select name="id_classe">
							<option value="" disabled selected>Choix de la classe</option>
							<?php
								$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch');
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			            		$sth = $pdo->prepare("SELECT * FROM classes");
			            		$sth->execute();

			            		$resultat = $sth->fetchAll();
								foreach ($resultat as $key => $value)
								{ ?>
									<option value="<?php echo $value['id_classe'];?>">
										<?php echo $value['nom_classe'];?>
									</option>
								<?php } ?>
						</select>
			           	<input type="hidden" name ="id_professeur" value="<?php echo $id?>">
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