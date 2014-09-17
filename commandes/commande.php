<?php session_start();
// La varibale $_SESSION[email] n'existe pas
// if (!isset($_SESSION["email"])) {
// header("Location:../index.php");
// exit ;
// }
// Connexion à la base
include ('../include/config.inc.php');
// if ($_SESSION["statut"] == 1)
// $sql = "SELECT c.id_commande, c.valide, u.nom FROM commande c, utilisateur u WHERE c.id_utilisateur = u.id_utilisateur ORDER BY c.id_commande";
// else
// $sql = "SELECT id_commande, valide FROM commande WHERE id_utilisateur = " . $_SESSION["id_utilisateur"];
$sql = "SELECT p.libelle_produit, p.prix, c1.total FROM produit p, commande c1, contient c2 WHERE c1.id_commande = c2.id_commande AND c2.id_commande = '" . $_GET["id"] . "' AND p.id_produit = c2.id_produit";
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
		
		<div align="center" id="msg">Commande validée !</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Libellé</th>
					<th>Prix</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = mysql_fetch_array($result)) {
					$total = $row["total"];
					echo "<tr>";
					echo "<td>" . $row["libelle_produit"] . "</td>";
					echo "<td>" . $row["prix"] . "</td>";
					echo "</tr>";
				}
			?>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<th>Total</th>
				<?php echo "<th>" . $total . "</th>"; ?>
			</tr>
</tbody>
</table>

<div align="right">
<?php echo "<a href=\"livraison.php?id=" . $_GET["id"] . "\" class=\"btn btn-large\">Payer</a>";?>
	</div>	

</div>
<!-- /container -->

	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/jquery-ui/jquery-ui.js"></script>
	<script src="../assets/js/jquery.urlshortener.js"></script>
	<script src="../assets/js/jquery.qrcode.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/js/script.js"></script>

</body>
</html>
