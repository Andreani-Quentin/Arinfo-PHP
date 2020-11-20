<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TP - Classe</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/50b4ed0339.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header class="container">
			<div class="row my-5">
				<div class="col-md-6">
					<h1>TP - Classe</h1>
				</div>
				<div class="col-md-6 text-right">
					<div class="row"><p>Bienvenue</p></div>
					<div class="row"><a href="login.php">Déconnexion</a></div>
					<div class="row"><a href="users.php">Créer un nouvel utilisateur</a></div>
				</div>
			</div>
		</header>

		<!------------------------------ CLASSES ------------------------------->

		<section class="container shadow my-5 p-5 bg-dark">
			<div class="row"><h2>Les Classes</h2></div>
			<div class="row">
				<table class="table table-dark table-striped table-hover">
					<thead>
						<tr>
							<th>Classe</th>
							<th>Voir la classe </th>
							<th>Modifier la classe</th>
							<th>Supprimer la classe</th>
						</tr>
					</thead>
					<?php
					try
					{
						$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch');
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			            $sth = $pdo->prepare("SELECT * FROM classes");
			            $sth->execute();

			            $resultat = $sth->fetchAll();

			            foreach ($resultat as $key => $value) 
			            {?>	
							<tbody>
			               		<tr>
			               			<td><?php echo $value['nom_classe']?></td>
			               			<td>
			               				<a href="affiche_classe.php?id_classe=<?php echo $value['id_classe']?>&amp;nom_classe=<?php echo $value['nom_classe'];?>">Voir</a>
			               			</td>
			               			<td>
			               				<a href="update_classe.php?id_classe=<?php echo $value['id_classe'];?>">Modifier</a>
			               			</td>
			               			<td>
			               				<a href="delete_classe.php?id_classe=<?php echo $value['id_classe'];?>">Supprimer</a>
			               			</td>
			               		</tr>
			            <?php }
			        }

			        catch(PDOException $e)
			        {
			            echo "Erreur : " . $e->getMessage();
			      	}?>
			               </tbody>
			    </table>
			</div>
		
			<div class="row justify-content-end">
			   	<div class="form_box">
			   		<h3>Ajouter une classe</h3>
			   		<form classe="form-control" action="insert_classe.php" method="post">
			   			<input type="text" name="nom_classe" placeholder="Nom de la nouvelle classe">
			   			<input type="submit" value="Valider" name="submit">
			   		</form>
			   	</div>
			</div>
		</section>

		<!------------------------------ PROFESSEUR ------------------------------->

		<section class="container shadow my-5 p-5 bg-dark">
			<div class="row"><h2>Les professeurs</h2></div>
			<div class="row">
				<table class="table table-dark table-striped table-hover">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Classe</th>
							<th>Modifier</th>
							<th>Supprimer</th>
						</tr>
					</thead>
					<?php
					try
					{
						$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch');
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			            $sth = $pdo->prepare("SELECT id_professeur, nom_professeur, prenom_professeur, nom_classe FROM professeur INNER JOIN classes ON classes.id_classe = professeur.classe_professeur");
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
			               				<a href="update_professeur.php?id_professeur=<?php echo $value['id_professeur'];?>">Modifier</a>
			               			</td>
			               			<td>
			               				<a href="delete_professeur.php?id_professeur=<?php echo $value['id_professeur'];?>">Supprimer</a>
			               			</td>
			               		</tr>
			            <?php }
			        }

			        catch(PDOException $e)
			        {
			            echo "Erreur : " . $e->getMessage();
			      	}?>
			               </tbody>
			    </table>
			</div>
		
			<div class="row justify-content-end">
			   	<div class="form_box text-right">
			   		<h3>Ajouter un professeur</h3>
			   		<form class="form-groupe"action="insert_professeur.php" method="post">
			   			<input type="text" name="nom_professeur" placeholder="Nom du professeur">
			   			<input type="text" name="prenom_professeur" placeholder="Prenom du professeur">
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
			   			<input type="submit" value="Valider" name="submit">
			   		</form>
			   	</div>
			</div>
		</section>

		<!------------------------------ ELEVES ------------------------------->

		<section class="container shadow my-5 p-5 bg-dark">
			<div class="row"><h2>Les élèves</h2></div>
			<div class="row">
				<table class="table table-dark table-striped table-hover">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Classe</th>
							<th>Date de naissance</th>
							<th>Modifier</th>
							<th>Supprimer</th>

						</tr>
					</thead>
					<?php
					try
					{
						$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch');
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			            $sth = $pdo->prepare("SELECT id_eleve, nom_eleve, prenom_eleve, nom_classe, date_naissance_eleve FROM eleves INNER JOIN classes ON classes.id_classe = eleves.classe_eleve");
			            $sth->execute();

			            $resultat = $sth->fetchAll();

			            foreach ($resultat as $key => $value) 
			            {?>	
							<tbody>
			               		<tr>
			               			<td><?php echo $value['nom_eleve']?></td>
			               			<td><?php echo $value['prenom_eleve'];?></td>
			               			<td><?php echo $value['nom_classe'];?></td>
			               			<td><?php echo $value['date_naissance_eleve'];?></td>
			               			<td>
			               				<a href="update_eleve.php?id_eleve=<?php echo $value['id_eleve'];?>">Modifier</a>
			               			</td>
			               			<td>
			               				<a href="delete_eleve.php?id_eleve=<?php echo $value['id_eleve'];?>">Supprimer</a>
			               			</td>
			               		</tr>
			            <?php }
			        }

			        catch(PDOException $e)
			        {
			            echo "Erreur : " . $e->getMessage();
			      	}?>
			               </tbody>
			    </table>
			</div>
		
			<div class="row justify-content-end">
			   	<div class="form_box text-right">
			   		<h3>Ajouter un élèves</h3>
			   		<form action="insert_eleve.php" method="post">
			   			<input type="text" name="nom_eleve" placeholder="Nom de l'élève">
			   			<input type="text" name="prenom_eleve" placeholder="Prenom de l'élève">
			   			<input type="date" name="date_naissance_eleve">
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