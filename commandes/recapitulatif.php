<?php session_start();
// // La varibale $_SESSION[email] n'existe pas
// if (!isset($_SESSION["email"])) {
// header("Location:../index.php");
// exit ;
// }
// // Connexion à la base
// include ('../include/config.inc.php');
// if ($_SESSION["statut"] == 1)
// $sql = "SELECT c.id_commande, c.valide, u.nom FROM commande c, utilisateur u WHERE c.id_utilisateur = u.id_utilisateur ORDER BY c.id_commande";
// else
// $sql = "SELECT id_commande, valide FROM commande WHERE id_utilisateur = " . $_SESSION["id_utilisateur"];
// $result = mysql_query($sql) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">

		<title>Récapitulatif</title>

		<!-- Bootstrap core CSS -->
		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../assets/css/style.css" rel="stylesheet">
	</head>

	<body>
		<div class="container">

			<div class="page-header">
				<h1>Récapitulatif</h1>
			</div>

			<div align="right">
				<a href="../accueil.php" class="btn btn-large">Accueil</a><a
				href="../connexion/deconnexion.php" class="btn btn-large">Déconnexion</a>
			</div>
			<div>
				<form class="form-horizontal" role="form" action="valider_commande.php" method="post">
					<div class="form-group">
						<?php echo $_GET["data"]
						?>
						<input type="hidden" name="nb" id="nb" value="<?php echo $_GET["nb"]?>">
						<input type="hidden" name="id" id="id" value="<?php echo $_GET["id"]?>">
					</div>
					<div align="right">
						<button type="submit" class="btn btn-primary" name="action" value="enregistrer">
							Enregistrer
						</button>
						<button type="submit" class="btn btn-primary" name="action" value="payer">
							Payer
						</button>
					</div>
				</form>
			</div>

		</div>
		<!-- /container -->

		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/jquery-ui/jquery-ui.min.js"></script>
		<script src="../assets/jquery-qrcode/jquery.qrcode-0.10.1.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/js/script.js"></script>

	</body>
</html>
