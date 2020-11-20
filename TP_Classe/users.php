<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Création d'un utilisateur</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
	integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/50b4ed0339.js" crossorigin="anonymous"></script>
</head>
<body>
	<section class="container my-5">
		<div class="row">
			<div class="col-md-6">
			<h1>Creation de compte</h1>
			</div>
			<div class="col-md-6 text-right">
				<a href="index.php">Retourner à la page d'accueil</a>
			</div>
		</div>
		<div class="row">
			<div class="form_box">
				<form action="users_form.php" method="post">
					<input type="text" name="pseudo" placeholder="Entrez votre pseudo">
					<input type="password" name="pass" placeholder="Entrez votre mot de passe"/>
					<input type="submit" value="Valider" name="submit">
				</form>
			</div>
		</div>
	</section>

	<?php
	if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
	if(isset($_GET['delete']))
	{
		echo $_GET['delete'];
	}
	?>
	<section class="container my-5">
		<div class="row"><h2>Les Utilisateurs</h2></div>
		<div class="row">
			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<th>Pseudo des utilisateur</th>
					</tr>
				</thead>
				<?php
				try
				{
					$pdo = new PDO('mysql:host=localhost;dbname=classe;port=3306', 'root', '0f78dhch');
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$sth = $pdo->prepare("SELECT * FROM users");
					$sth->execute();

					$resultat = $sth->fetchAll();

					foreach ($resultat as $key => $value) 
						{?>	
							<tbody>
								<tr>
									<td><?php echo $value['pseudo']?></td>
									<td>
										<a href="delete_users.php?id=<?php echo $value['id'];?>">Supprimer</a>
									</td>
								</tr>
							<?php }
						}
						catch (PDOException $e) 
						{
							echo "Erreur : " . $e->getMessage();
						}
						?>
					</tbody>
				</table>
			</div>
		</section>
		<!------------------------------ SCRYPT ------------------------------->

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
	</html>