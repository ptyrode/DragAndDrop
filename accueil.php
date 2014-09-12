<?php session_start();
// La varibale $_SESSION[email] n'existe pas
if (!isset($_SESSION["email"])) {
	header("Location:index.php");
	exit ;
}
// Connexion à la base
include ('include/config.inc.php');
$sql = "SELECT id_categorie, libelle_categorie, mini_categorie FROM categorie";
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

		<title>Drag and Drop</title>

		<!-- Bootstrap core CSS -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="assets/css/style.css" rel="stylesheet">

	</head>

	<body>
		<div class="container">

			<div class="page-header">
				<h1>Drag and Drop</h1>
			</div>

			<div align="right">
				<a href="liste_commandes.php" id="deco" class="btn btn-large">Liste des commandes</a>
				<a href="deconnexion.php" id="deco" class="btn btn-large">Déconnexion</a>
			</div>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php
				$i = 0;
				while ($row = mysql_fetch_array($result)) {
					if ($i == 0)
						echo "<li class=\"active\">";
					else
						echo "<li>";
					echo "<a href=\"#" . $row['mini_categorie'] . "\" role=\"tab\" data-toggle=\"tab\">" . $row['libelle_categorie'] . "</a>";
					echo "</li>";
					$i = 1;
				}
			?>
</ul>

<div class="row">
	<!-- Tab panes -->
	<div class="tab-content">
		<?php
		$i = 0;
		mysql_data_seek($result, 0);
		while ($row = mysql_fetch_array($result)) {
			if ($i == 0)
				echo "<div class=\"tab-pane active\" id=\"" . $row['mini_categorie'] . "\">";
			else
				echo "<div class=\"tab-pane\" id=\"" . $row['mini_categorie'] . "\">";
			echo "<div id=\"drag\" class=\"connected col-md-5\">";
			$sql1 = "SELECT p.libelle_produit, p.image, p.prix FROM produit p, categorie c WHERE p.id_categorie = c.id_categorie and c.id_categorie=" . $row['id_categorie'];
			$result1 = mysql_query($sql1) or die(mysql_error());
			while ($row1 = mysql_fetch_array($result1)) {
				echo "<div class=\"col-xs-6 col-md-4\">";
				echo "<img src=\"assets/img/" . $row1['image'] . "\" alt=\"\" data-libelle=\"" . $row1['libelle_produit'] . "\" data-prix=\"" . $row1['prix'] . "\">";
				echo "</div>";
			}
			echo "</div></div>";
			$i = 1;
		}
	?>
</div>
<div id="drop" class="connected col-md-5"></div>
<div id="cart" class="col-md-2">
	<h3>Panier</h3>
	<br>
	<div class="placeholder" id="panier"></div>
	<br>
	<div class="placeholder" id="total"></div>
	<br>
	<div class="placeholder" id="qrcode"></div>
</div>
</div>
</div>
<!-- /container -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/jquery-qrcode/jquery.qrcode-0.10.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>
