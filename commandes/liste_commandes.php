<?php session_start();
// La varibale $_SESSION[email] n'existe pas
if (!isset($_SESSION["email"])) {
	header("Location:../index.php");
	exit ;
}
// Connexion à la base
include ('../include/config.inc.php');
if ($_SESSION["statut"] == 1)
	$sql = "SELECT c.id_commande, c.valide, u.nom FROM commande c, utilisateur u WHERE c.id_utilisateur = u.id_utilisateur ORDER BY c.id_commande";
else
	$sql = "SELECT id_commande, valide FROM commande WHERE id_utilisateur = " . $_SESSION["id_utilisateur"];
$result = mysql_query($sql) or die(mysql_error());
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

<title>Commandes</title>

<!-- Bootstrap core CSS -->
<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>
	<div class="container">

		<div class="page-header">
			<h1>Commandes</h1>
		</div>

		<div align="right">
			<a href="../accueil.php" class="btn btn-large">Accueil</a>
			<a href="../connexion/deconnexion.php" class="btn btn-large">Déconnexion</a>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Numéro commande</th>
					<?php
					if ($_SESSION["statut"] == 1)
						echo "<th>Utilisateur</th>";
					?>
					<th>Statut</th>
					<?php
					if ($_SESSION["statut"] != 1)
						echo "<th>Option</th>";
					?>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = mysql_fetch_array($result)) {
					echo "<tr>";
					echo "<td><a href=\"\" class=\"btn-large\">" . $row['id_commande'] . "</a></td>";
					if ($_SESSION["statut"] == 1)
						echo "<td>" . $row['nom'] . "</td>";
					if ($row['valide'] == 1)
						echo "<td>OK</td>";
					else
						echo "<td>PAS VALIDE</td>";
					if ($_SESSION["statut"] != 1 && $row['valide'] != 1)
						echo "<td><a href=\"\" class=\"btn-large\">Valider</a></td>";
					else
						echo "<td></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>

	</div>
	<!-- /container -->

	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/jquery-ui/jquery-ui.min.js"></script>
	<script src="../assets/jquery-qrcode/jquery.qrcode-0.10.1.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/js/script.js"></script>

</body>
</html>
