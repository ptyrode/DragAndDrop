<?php session_start();

// Connexion à la base
include ('../include/config.inc.php');

// Les deux champs ont été remplis
if (isset($_POST["email"]) && isset($_POST["mdp"])) {
	$sql = "SELECT COUNT(id_utilisateur), email, mdp, statut FROM utilisateur WHERE email='" . $_POST["email"] . "' GROUP BY id_utilisateur";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);

	//Gestion des erreurs
	$erreur = 0;
	if (md5($_POST["mdp"]) != $row["mdp"])
		$erreur = 1;
	if ($row[0] != 1)
		$erreur = 1;

	if ($erreur == 0) {
		// Connexion effective $_SESSION[email]
		$_SESSION["id_utilisateur"] = $row["id_utilisateur"];
		$_SESSION["email"] = $row["email"];
		header("Location:../accueil.php");
		exit ;
	} else {
		header("Location:../index.php");
		exit ;
	}
} else {
	header("Location:../index.php");
	exit ;
}
?>