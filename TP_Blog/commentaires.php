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
	<p><a href="index.php">Retour à la liste des billets</a></p>

	<?php
				try
				{
					$pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '0f78dhch');
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}

				$req = $pdo->prepare('SELECT id, titre, contenu, DATE_FORMAT(datePost, \'%d/%m/%Y à %Hh%imin%ss\') AS datePost_fr FROM posts WHERE id = ?');
				if(!empty($_GET))
				{
					$req->execute(array($_GET['posts']));
				}
				$donnees = $req->fetch();
				?>

				<div class="news">
					<h3>
						<?php echo htmlspecialchars($donnees['titre']); ?>
						<em>le <?php echo $donnees['datePost_fr']; ?></em>
					</h3>

					<p>
						<?php
						echo nl2br(htmlspecialchars($donnees['contenu']));
						?>
					</p>
				</div>

	<div class="row comment_box">
		<form method="post" action="admin_com.php">
			<input type="text" name="auteur" placeholder="Votre Pseudo">
			<textarea name="commentaire" placeholder="Ecrivez votre commentaire"></textarea>
			<input type="hidden" name="idPost" value="<?php echo $_GET['posts']?>">
			<div class="text-right">
				<button class="btn_perso" type="submit">Envoyer</button>
			</div>
		</form>
	</div>

			

				<h2>Commentaires</h2>

				<?php
			$req->closeCursor();

			
			$req = $pdo->prepare('SELECT auteur, commentaire, DATE_FORMAT(dateCommentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS dateCommentaire_fr FROM commentaires WHERE idPost = ? ORDER BY dateCommentaire');
			$req->execute(array($_GET['posts']));

			while ($donnees = $req->fetch())
			{
				?>
				<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['dateCommentaire_fr']; ?></p>
				<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
				<?php
			}
			$req->closeCursor();
			?>
</body>
</html>