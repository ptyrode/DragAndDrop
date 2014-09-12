<?php session_start();
// La varibale $_SESSION[email] existe déjà
if (isset($_SESSION["email"])) {
	header("Location:accueil.php");
	exit ;
}
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
					<h1 class="title">Login</h1>
				</div><!--loginheader-->

				<div class="loginform">

					<form id="login" action="connexion.php" method="post">
						<p>
							<label for="email" class="bebas">Email</label>
							<input type="text" id="email" name="email" value="" class="radius2" />
						</p>
						<p>
							<label for="mdp" class="bebas">Mot de passe</label>
							<input type="password" id="mdp" name="mdp"  class="radius2" />
						</p>
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