<!doctype html>
<html lang="fr">
    <head>
    	<title> Formulaire Commande </title>
   		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Gestion des commandes">
		<meta name="author" content="Mohamed EL MOUTTAKI">
		<meta name="robots" content="noindex,nofollow">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"> </script>
	</head>

	<body>

		<?php require('conf/connexion.inc.php'); ?>

		<form id="formulaire_commande" action="script_commande.php" method="post">

			<div>
				<label for="user"> Utilisateur : </label> <br />
				<select name="user">
					<?php 
						$req_users = $bdd->query('SELECT id_user, nom, prenom FROM tab_users /* WHERE responsable = */');
						while ($data_users = $req_users->fetch())
    					{ 
    						echo '<option value="'.$data_users['id_users'].'">'.$data_users['nom'].' '.$data_users['prenom'].'</option>';
						}
						$req_users->closeCursor(); 
					?>
				</select>
			</div>

			<div>
				<label for="type_apparreil"> Type : </label> <br />
				<select name="type_apparreil">
					<?php 
						$req_type = $bdd->query('SELECT type FROM tab_modeles');
						while ($data_type = $req_type->fetch())
    					{ 
    						echo '<option value="'.$data_type['type'].'">'.$data_type['type'].'</option>';
						}
						$req_type->closeCursor();
					?>
				</select>
			</div>
			<div>
				<label for="modele"> Modèle :</label> <br />
				<select name="modele">
					<?php 
						$req_modele = $bdd->query('SELECT id_modele, marque, modele FROM tab_modeles /* WHERE type = */');
						while ($data_modele = $req_modele->fetch())
    					{ 
    						echo '<option value="'.$data_modele['id_modele'].'">'.$data_modele['marque'].' '.$data_modele['modele'].'</option>';
						}
						$req_modele->closeCursor();
					?>
				</select>
			</div>
		 	<div>
			    <label for="commentaire"> Commentaire :</label> <br />
			    <textarea rows="4" cols="50"> Demande particulière </textarea>
			</div>
			<div>
				<input type="submit" id="envoyer" value="Envoyer" />
			</div>
		</form>
	</body>
</html>