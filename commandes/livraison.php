<?php session_start();

// Connexion à la base
include ('../include/config.inc.php');
// La varibale $_SESSION[email] n'existe pas
if (!isset($_SESSION["email"])) {
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

		<title>Connexion</title>

		<!-- Custom styles for this template -->
		<link href="assets/css/login.css" rel="stylesheet">

	</head>

	<body class="login">

		<div class="loginbox radius">
			<div class="loginboxinner radius">
				<div class="loginheader">
					<h1 class="title">Connexion</h1>
				</div><!--loginheader-->

				<div class="loginform">

					<form id="login" action="../connexion/connexion.php" method="post">
						<p>
							<label for="email" class="bebas">Email</label>
							<input type="text" id="email" name="email" value="" class="radius2" />
						</p>
						<p>
							<label for="mdp" class="bebas">Mot de passe</label>
							<input type="password" id="mdp" name="mdp"  class="radius2" />
						</p>
						<input type="hidden" name="livraison" value="<?php echo $_GET["id"]; ?>"
						<p>
						<button class="radius title" name="client_login">
						Connexion
						</button>
						</p>
					</form>
				</div><!--loginform-->
			</div><!--loginboxinner-->
		</div><!--loginbox-->
	</body>

</html>
<?php }
	else {
	$sql = "SELECT u.id_utilisateur FROM utilisateur u, commande c WHERE u.id_utilisateur = c.id_utilisateur AND c.id_commande='" . $_GET["id"] . "'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$id = $row[0];
	if($_SESSION["id_utilisateur"]!=$id){
	header("Location:../accueil.php");
	exit ;
	}
	else{
	$sql1 = "SELECT a.nom_adresse, a.prenom_adresse, a.rue_adresse, a.code_adresse, a.ville_adresse, a.tel_adresse FROM adresse a, utilisateur u WHERE a.id_utilisateur = u.id_utilisateur AND u.id_utilisateur='" . $id . "' AND a.etat='0'";
	$result1 = mysql_query($sql1) or die(mysql_error());
	$row1 = mysql_fetch_array($result1);

	$sql2 = "SELECT COUNT(a.id_adresse), a.nom_adresse, a.prenom_adresse, a.rue_adresse, a.code_adresse, a.ville_adresse, a.tel_adresse FROM adresse a, utilisateur u WHERE a.id_utilisateur = u.id_utilisateur AND u.id_utilisateur='" . $id . "' AND a.etat='1'";
	$result2 = mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_array($result2);

	$sql3 = "SELECT COUNT(a.id_adresse), a.nom_adresse, a.prenom_adresse, a.rue_adresse, a.code_adresse, a.ville_adresse, a.tel_adresse FROM adresse a, utilisateur u WHERE a.id_utilisateur = u.id_utilisateur AND u.id_utilisateur='" . $id . "' AND a.etat='2'";
	$result3 = mysql_query($sql3) or die(mysql_error());
	$row3 = mysql_fetch_array($result3);

	//$formule="(6366*acos(cos(radians($latitude))*cos(radians(`latitude`))*cos(radians(`longitude`) -radians($longitude))+sin(radians($latitude))*sin(radians(`lat`))))";
	// $sql4="SELECT ville,$formule AS dist FROM ville WHERE $formule<='$_GET[distance]' ORDER by dist ASC";

	$sql4 = "SELECT libelle_relais, latitude, longitude FROM relais";
	$result4 = mysql_query($sql4) or die(mysql_error());
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

<title>Livraison</title>

<!-- Bootstrap core CSS -->
<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<!-- <link href="../assets/css/style.css" rel="stylesheet"> -->
</head>

<body>
	<div class="container">

		<div class="page-header">
			<h1>Livraison</h1>
		</div>

		<div align="right">
			<a href="../accueil.php" class="btn btn-large">Accueil</a>
			<a href="../connexion/deconnexion.php" class="btn btn-large">Déconnexion</a>
		</div>

		<!-- <div align="center" id="msg">
			Commande validée !
		</div> -->

		<form class="form-horizontal" role="form">
		  <div class="form-group" style="padding-left: 15px;">
		    <label for="adresse1">Adresse</label>
		    <span id="adresse1">
		    	<?php
				echo "<br>" . $row1['nom_adresse'] . " " . $row1['prenom_adresse'];
				echo "<br>" . $row1['rue_adresse'];
				echo "<br>" . $row1['code_adresse'] . " " . $row1['ville_adresse'];
				echo "<br>" . $row1['tel_adresse'];
				?>
		    </span>
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" id="checkbox2" checked=""> Adresse de facturation identique
		    </label>
		  </div>
		  <div id="adresse2"><br>
		   <div class="form-group">
		    <label for="nom2" class="col-sm-2 control-label">Nom</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nom2" value="<?php echo(isset($row2['nom_adresse'])) ? $row2['nom_adresse'] : $row1['nom_adresse']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="prenom2" class="col-sm-2 control-label">Prénom</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="prenom2" value="<?php echo(isset($row2['prenom_adresse'])) ? $row2['prenom_adresse'] : $row1['prenom_adresse']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="adresse2" class="col-sm-2 control-label">Adresse</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="adresse2" value="<?php echo(isset($row2['rue_adresse'])) ? $row2['rue_adresse'] : $row1['rue_adresse']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="code2" class="col-sm-2 control-label">Code postal</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="code2" value="<?php echo(isset($row2['code_adresse'])) ? $row2['code_adresse'] : $row1['code_adresse']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="ville2" class="col-sm-2 control-label">Ville</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="ville2" value="<?php echo(isset($row2['ville_adresse'])) ? $row2['ville_adresse'] : $row1['ville_adresse']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="tel2" class="col-sm-2 control-label">Téléphone</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="tel2" value="<?php echo(isset($row2['tel_adresse'])) ? $row2['tel_adresse'] : $row1['tel_adresse']; ?>">
			</div>
		 </div>
		</div>
		<div class="checkbox">
		<label><input type="checkbox" id="checkbox3" checked="">Adresse de livraison identique </label>
		</div>
		<div id="adresse3"><br>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="active">
			<a href="#domicile" class="livraison" role="tab" data-toggle="tab">Livraison à domicile</a>
		</li>
		<li>
			<a href="#relais" class="livraison" role="tab" data-toggle="tab">Livraison en point relais</a>
		</li>
	</ul><br>
	<div class="row">
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="domicile">
				<div class="form-group">
					<label for="nom3" class="col-sm-2 control-label">Nom</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nom3" value="<?php echo(isset($row3['nom_adresse'])) ? $row3['nom_adresse'] : $row1['nom_adresse']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="prenom3" class="col-sm-2 control-label">Prénom</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="prenom3" value="<?php echo(isset($row3['prenom_adresse'])) ? $row3['prenom_adresse'] : $row1['prenom_adresse']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="adresse3" class="col-sm-2 control-label">Adresse</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="adresse3" value="<?php echo(isset($row3['rue_adresse'])) ? $row3['rue_adresse'] : $row1['rue_adresse']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="code3" class="col-sm-2 control-label">Code postal</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="code3" value="<?php echo(isset($row3['code_adresse'])) ? $row3['code_adresse'] : $row1['code_adresse']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="ville3" class="col-sm-2 control-label">Ville</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="ville3" value="<?php echo(isset($row3['ville_adresse'])) ? $row3['ville_adresse'] : $row1['ville_adresse']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="tel3" class="col-sm-2 control-label">Téléphone</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tel3" value="<?php echo(isset($row3['tel_adresse'])) ? $row3['tel_adresse'] : $row1['tel_adresse']; ?>"
					</div>
				</div>
			</div>
			</div>
			<div class="tab-pane" id="relais">
				<div class="col-sm-3">
					<?php
					$i = 1;
					while ($row4 = mysql_fetch_array($result4)) {
						echo "<div class=\"radio\">";
						echo "<label>";
						echo "<input type=\"radio\" name=\"options\" id=\"option" . $i . "\" value=\"" . $row4["libelle_relais"] . "\" data-latitude=\"".$row4["latitude"]."\" data-longitude=\"".$row4["longitude"]."\">";
						echo $row4["libelle_relais"];
						echo "</label>";
						echo "</div>";
						$i++;
					}
				?>
				</div>
				<div class="col-sm-9">
					<div id="map-canvas" style="width:640px;height:480px"></div>
				</div>
				<!-- <!-- Un élément HTML pour recueillir la carte -->
				<!--	<div id="map" style="width:640px;height:480px"></div> -->
		</div>
	</div>
</div><br>
		<button type="submit" class="btn btn-default">
			Submit
		</button>
		</form>
	</div>
<!-- /container -->
		
<!-- Chargement de l'API Google maps -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/jquery-ui/jquery-ui.js"></script>
<script src="../assets/js/jquery.urlshortener.js"></script>
<script src="../assets/js/jquery.qrcode.js"></script>
<script src="../assets/bootstrap/js/bootstrap.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>
<?php }
	}
?>