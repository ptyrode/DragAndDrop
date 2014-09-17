<?php session_start();

// Connexion à la base
include ('../include/config.inc.php');

if (isset($_POST['action'])) {

	$sql = "INSERT INTO commande VALUES (null, '" . $_POST["id"] . "', '" . $_POST["total"] . "', '0')";
	$result = mysql_query($sql) or die(mysql_error());

	$sql1 = "SELECT MAX(id_commande) FROM commande";
	$result1 = mysql_query($sql1) or die(mysql_error());
	$row1 = mysql_fetch_array($result1);

	$id_commande = $row1[0];

	$nb = $_POST["nb"];
	for ($i = 1; $i <= $nb; $i++) {
		
		$sql = "SELECT id_produit FROM produit WHERE libelle_produit='" . $_POST["produit" . $i] . "'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id_produit = $row[0];
		
		$sql1 = "INSERT INTO contient VALUES ('" . $id_commande . "', '" . $id_produit . "')";
		$result1 = mysql_query($sql1) or die(mysql_error());
	}

	if ($_POST['action'] == 'enregistrer') {
		header("Location:commande.php?id=" . $id_commande);
		exit ;
	} else if ($_POST['action'] == 'payer') {
		header("Location:livraison.php?id=" . $id_commande);
		exit ;
	} else {
		//invalid action!
	}
}

// // Les deux champs ont été remplis
// if (isset($_POST["email"]) && isset($_POST["mdp"])) {
// $sql = "SELECT COUNT(id_utilisateur), id_utilisateur, email, mdp, statut FROM utilisateur WHERE email='" . $_POST["email"] . "' GROUP BY id_utilisateur";
// $result = mysql_query($sql) or die(mysql_error());
// $row = mysql_fetch_array($result);
//
// //Gestion des erreurs
// $erreur = 0;
// if (md5($_POST["mdp"]) != $row["mdp"])
// $erreur = 1;
// if ($row[0] != 1)
// $erreur = 1;
//
// if ($erreur == 0) {
// // Connexion effective $_SESSION[email]
// $_SESSION["id_utilisateur"] = $row["id_utilisateur"];
// $_SESSION["email"] = $row["email"];
// $_SESSION["statut"] = $row["statut"];
// header("Location:../accueil.php");
// exit ;
// } else {
// header("Location:../index.php");
// exit ;
// }
// } else {
// header("Location:../index.php");
// exit ;
// }
?>