<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TP_Blog</title>
		<link rel="stylesheet" href="style/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/50b4ed0339.js" crossorigin="anonymous"></script>
	</head>
	<body>

		<section>
			<div class="row">
				<div class="col-md-4 text-center">
					<h1>TP Blog</h1>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 creation_box">
					<form method="post" action="admin.php">
						<div>
							<input class="text-center titre" type="text" name="titre" placeholder="Titre de votre post" value="">
						</div>
						<textarea name="contenu" placeholder="Ecrivez votre contenu ici..."></textarea>
						<div class="text-right">
							<button class="btn_perso" type="submit">Envoyer</button>
						</div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div>
						<?php

						try 
						{
							$pdo = new PDO('mysql:host=localhost;dbname=blog;port=3306', 'root', '0f78dhch');
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}
						catch(Exception $e)
						{
							die('Erreur : '.$e->getMessage());
						}

						$post = $pdo->query('SELECT id, titre, contenu FROM posts ORDER BY id DESC LIMIT 0, 10');

						while ($donnees = $post->fetch())
							{ ?>
								<div class="post_box">. 
									<div class="row titre_post"> <?php echo htmlspecialchars($donnees['titre']) ?></div>
									<div class="row contenu"> <?php echo htmlspecialchars($donnees['contenu']) ?></div>
									<em><a href="commentaires.php?posts=<?php echo $donnees['id']; ?>">Commentaires</a></em>
								</div>
							<?php 
							}
							$post->closeCursor();
							?>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</section>		

			<!------------------------------ SCRYPT ------------------------------->

			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>