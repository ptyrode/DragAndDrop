<?php

/**
 * @author Serial Dealer
 * @copyright 2012
 */

// Affiche le numéro des pages
function affiche_pages($nb, $total, $lien, $limite){
	$nbpages = ceil($total / $nb);
	$pageA = ceil($limite / $nb) + 1;
	$numeroPages = 1;
	$nblimite = 0;
	$pages = '<br><div data-role="controlgroup" data-type="horizontal" data-mini="true" align="center">';
	if ($nbpages > 4) {
		if ($pageA == 1) {
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
			$numeroPages = $numeroPages + 1;
			$nblimite = $nblimite + $nb;
			while ($numeroPages < 4) {
				$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$numeroPages = $nbpages;
			$nblimite = ($nbpages - 1) * $nb;
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">...</a>';
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
		}
		else if ($pageA == $nbpages) {
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">...</a>';
			$numeroPages = $nbpages - 2;
			$nblimite = $limite - (2 * $nb);
			while ($numeroPages < $nbpages) {
				$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">' . $nbpages . '</a>';
		}
		else {
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">...</a>';
			$numeroPages = $pageA - 1;
			$nblimite = ($pageA - 2) * $nb;
			while ($numeroPages <= $pageA) {
				if ($numeroPages != 1) {
					if ($numeroPages == $pageA)
						$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
					else
						$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
				}
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$numeroPages = $pageA + 1;
			$nblimite = $pageA * $nb;
			while ($numeroPages <= $pageA + 1) {
				if ($numeroPages != $nbpages) {
					if ($numeroPages == $pageA)
						$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
					else
						$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
				}
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$numeroPages = $nbpages;
			$nblimite = ($nbpages - 1) * $nb;
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">...</a>';
			$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
		}
	}
	else {
		while ($numeroPages <= $nbpages) {
			if ($numeroPages == $pageA)
				$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
			else
				$pages = $pages . '<a data-ajax="false" data-theme="a" data-content-theme="a" href="' . $lien . $numeroPages . '.htm" data-role="button">' . $numeroPages . '</a>';
			$numeroPages = $numeroPages + 1;
			$nblimite = $nblimite + $nb;
		}
	}
	$pages = $pages . '</div><br>';
	return $pages;
}

// Affiche le numéro des pages javascript
function affiche_pages2($nb, $total, $lien, $limite){
	$nbpages = ceil($total / $nb);
	$pageA = ceil($limite / $nb) + 1;
	$numeroPages = 1;
	$nblimite = 0;
	$pages = '<br><div data-role="controlgroup" data-type="horizontal" data-mini="true" align="center" id="page">';
	if ($nbpages > 4) {
		if ($pageA == 1) {
			$pages = $pages . '<a data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
			$numeroPages = $numeroPages + 1;
			$nblimite = $nblimite + $nb;
			while ($numeroPages < 4) {
				$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$numeroPages = $nbpages;
			$nblimite = ($nbpages - 1) * $nb;
			$pages = $pages . '<a data-role="button" class="ui-disabled">...</a>';
			$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
		}
		else if ($pageA == $nbpages) {
			$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
			$pages = $pages . '<a data-role="button" class="ui-disabled">...</a>';
			$numeroPages = $nbpages - 2;
			$nblimite = $limite - (2 * $nb);
			while ($numeroPages < $nbpages) {
				$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$pages = $pages . '<a data-role="button" class="ui-disabled">' . $nbpages . '</a>';
		}
		else {
			$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
			$pages = $pages . '<a data-role="button" class="ui-disabled">...</a>';
			$numeroPages = $pageA - 1;
			$nblimite = ($pageA - 2) * $nb;
			while ($numeroPages <= $pageA) {
				if ($numeroPages != 1) {
					if ($numeroPages == $pageA)
						$pages = $pages . '<a data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
					else
						$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
				}
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$numeroPages = $pageA + 1;
			$nblimite = $pageA * $nb;
			while ($numeroPages <= $pageA + 1) {
				if ($numeroPages != $nbpages) {
					if ($numeroPages == $pageA)
						$pages = $pages . '<a data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
					else
						$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
				}
				$numeroPages = $numeroPages + 1;
				$nblimite = $nblimite + $nb;
			}
			$numeroPages = $nbpages;
			$nblimite = ($nbpages - 1) * $nb;
			$pages = $pages . '<a data-role="button" class="ui-disabled">...</a>';
			$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
		}
	}
	else {
		while ($numeroPages <= $nbpages) {
			if ($numeroPages == $pageA)
				$pages = $pages . '<a data-role="button" class="ui-disabled">' . $numeroPages . '</a>';
			else
				$pages = $pages . '<a href="' . $lien . '' . $nblimite . ')" data-role="button">' . $numeroPages . '</a>';
			$numeroPages = $numeroPages + 1;
			$nblimite = $nblimite + $nb;
		}
	}

	$pages = $pages . '</div><br>';
	return $pages;
}

// Active les boutons votes
function active_votes($deal, $id){
	$lim_vote = 0;
	$bloque = 0;

	if($id==0) {
		$bloque = 1;
	}

	else {
		$sql = "SELECT est_expire, par FROM deals WHERE idd=" . $deal . "";
		$result = mysql_query($sql) or die (mysql_error());
		while ($row = mysql_fetch_array($result)) {
			if (!isset($_SESSION["user_id"]) || $row["par"] == $_SESSION["user_id"] || $row["est_expire"] == 1) {
				$bloque = 1;
			}
		}
		$sql = "SELECT * FROM votes WHERE iddeal=" . $deal . "";
		$result = mysql_query($sql) or die (mysql_error());
		while ($row = mysql_fetch_array($result)) {
			if (!isset($_SESSION["user_id"]) || stristr($row["votes_plus"], ';' . $_SESSION["user_id"] . ';') == true || stristr($row["votes_moins"], ';' . $_SESSION["user_id"] . ';') == true || $_SESSION["user_id"] == "" || $lim_vote == 1) {
				$bloque = 1;
			}
		}
	}
	return $bloque;
}

// Verifie l'adresse du deal
function domain($domain){
	$bits = explode('/', $domain);
	if ($bits[0] == 'http:' || $bits[0] == 'https:')
		$domain = $bits[2];
	else
		$domain = $bits[0];
	unset($bits);
	$bits = explode('.', $domain);
	$idz = count($bits);
	$idz -= 3;
	if (strlen($bits[($idz + 2)]) == 2)
		$url = $bits[$idz] . '.' . $bits[($idz + 1)] . '.' . $bits[($idz + 2)];
	else if (strlen($bits[($idz + 2)]) == 0)
		$url = $bits[($idz)] . '.' . $bits[($idz + 1)];
	else
		$url = $bits[($idz + 1)] . '.' . $bits[($idz + 2)];
	$url = str_replace("www.", "", $url);
	return $url;
}

// Convertit la date au format d'affichage
function convert_date($chaine){
	$jour = substr($chaine, 6, 2) . "/" . substr($chaine, 4, 2) . "/" . substr($chaine, 0, 4);
	$heure = substr($chaine, 8, 2) . ":" . substr($chaine, 10, 2) . ":" . substr($chaine, 12, 2);
	$agrave = " &agrave; ";
	$date = $jour . $agrave . $heure;
	return $date;
}

// Affiche l'entete html
function html_header(){
	echo "
	<!DOCTYPE html>
	<html>
	<head>
	<meta http-equiv=\"content-type\" content=\"text/html; charset=ISO_8859-1\"/>
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
	<link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css\" />
	<link rel=\"stylesheet\" href=\"http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css\" />
	<link rel=\"stylesheet\" href=\"/css/themes/my-custom-theme.min.css\" />
	<script src=\"http://code.jquery.com/jquery-1.8.2.min.js\"></script>
	<script src=\"http://code.jquery.com/ui/1.9.1/jquery-ui.js\"></script>
	<script src=\"/script.js\"></script>
	<script src=\"http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js\"></script>";
}

// Verifie la validité de l'adresse mail
function valide_mail($email){
	$mail_valide = ereg("([A-Za-z0-9]|-|_|\.)*@([A-Za-z0-9]|-|_|\.)*\.([A-Za-z0-9]|-|_|\.)*",$email);
	if ($mail_valide) return 1;
	else return 0;
}

// Mot de passe aléatoire
function car_aleatoire($taille){
	$cars="azertyiopqsdfghjklmwxcvbn0123456789"; //Listes des caractères possibles
	$mdp='';
	$long=strlen($cars);
	srand((double)microtime()*1000000); //Initialise le générateur de nombres aléatoires
	for($i=0;$i<$taille;$i++)$mdp=$mdp.substr($cars,rand(0,$long-1),1);
}

// Formatage de texte
function clean_hack($texte1){
	$texte1=str_replace("script","scriipt",$texte1);
	if($_SESSION["user_pseudo"]!="tiprix"){
		$texte1=str_replace("<","&#8249;",$texte1);
		$texte1=str_replace(">","&#8250;",$texte1);
	}
	return $texte1;
}

// Distance entre deux points
function get_distance_m($lat1, $lng1, $lat2, $lng2){
	$earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
	$rlo1 = deg2rad($lng1);
	$rla1 = deg2rad($lat1);
	$rlo2 = deg2rad($lng2);
	$rla2 = deg2rad($lat2);
	$dlo = ($rlo2 - $rlo1) / 2;
	$dla = ($rla2 - $rla1) / 2;
	$a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
	$d = 2 * atan2(sqrt($a), sqrt(1 - $a));
	return ($earth_radius * $d);
}

// Retourne un message d'erreur suivant le type
function errormsge($error){
	header('Content-Type: text/html;charset=ISO_8859-1');
	switch($error){
		case 2:
			$msge= "Les mots de passe ne correspondent pas";
			break;
		case 3:
			$msge= "Votre pseudo doit comporter entre 4 et 15 caract&egrave;res";
			break;
		case 4:
			$msge= "Votre mot de passe doit comporter entre 5 et 12 caract&egrave;res";
			break;
		case 5:
			$msge= "Le pseudo ne doit comporter que des chiffres et des lettres";
			break;
		case 6:
			$msge= "Cette adresse email n'est pas valide";
			break;
		case 7:
			$msge= "Cette adresse email est d&eacute;ja utilis&eacute;e";
			break;
		case 8:
			$msge= "Ce pseudo existe d&eacute;j&agrave;";
			break;
		case 9:
			$msge= "Vous devez accepter le r&egrave;glement";
			break;
		case 10:
			$msge= "Le mot de passe n'est pas valide";
			break;
		case 11:
			$msge= "Pseudo inconnu";
			break;
		case 12:
			$msge= "Le lien est invalide";
			break;
		case 13:
			$msge= "Le lien est invalide";
			break;
		case 14:
			$msge= "Le titre doit comporter 10 caract&egrave;res minimum";
			break;
		case 15:
			$msge= "Le nom du magasin doit comporter 3 caract&egrave;res minimum";
			break;
		case 16:
			$msge= "Pas de ville saisie";
			break;
		case 17:
			$msge= "Ville inconnue";
			break;
		case 18:
			$msge= "";
			break;
		case 19:
			$msge= "";
			break;
		case 20:
			$msge= "Pas de prix saisi";
			break;
		case 21:
			$msge= "Saisir un prix sans symbole";
			break;
	}
	return ($msge);
}

// Ajoute les smiley
function smiley($texte){
	$texte=str_replace("[b]",'<b>',$texte);
	$texte=str_replace("[/b]",'</b>',$texte);
	$texte=str_replace(":0:",'<img src="http://www.serialdealer.eu/smiley/0etoile.gif">',$texte);
	$texte=str_replace(":1:",'<img src="http://www.serialdealer.eu/smiley/1etoile.gif">',$texte);
	$texte=str_replace(":2:",'<img src="http://www.serialdealer.eu/smiley/2etoiles.gif">',$texte);
	$texte=str_replace(":3:",'<img src="http://www.serialdealer.eu/smiley/3etoiles.gif">',$texte);
	$texte=str_replace(":4:",'<img src="http://www.serialdealer.eu/smiley/4etoiles.gif">',$texte);
	$texte=str_replace(":5:",'<img src="http://www.serialdealer.eu/smiley/5etoiles.gif">',$texte);
	$texte=str_replace(":)",'<img src="http://www.serialdealer.eu/smiley/sourire.gif">',$texte);
	$texte=str_replace("8)",'<img src="http://www.serialdealer.eu/smiley/bogoss.gif">',$texte);
	$texte=str_replace(":P",'<img src="http://www.serialdealer.eu/smiley/clindoeil.gif">',$texte);
	$texte=str_replace(":D",'<img src="http://www.serialdealer.eu/smiley/content.gif">',$texte);
	$texte=str_replace(":O",'<img src="http://www.serialdealer.eu/smiley/curious.gif">',$texte);
	$texte=str_replace("O)",'<img src="http://www.serialdealer.eu/smiley/cyclope.gif">',$texte);
	$texte=str_replace("X)",'<img src="http://www.serialdealer.eu/smiley/dx.gif">',$texte);
	$texte=str_replace(":good:",'<img src="http://www.serialdealer.eu/smiley/good.gif">',$texte);
	$texte=str_replace(" :/",'<img src="http://www.serialdealer.eu/smiley/humpf.gif">',$texte);
	$texte=str_replace(":/ ",'<img src="http://www.serialdealer.eu/smiley/humpf.gif">',$texte);
	$texte=str_replace(":omg:",'<img src="http://www.serialdealer.eu/smiley/omg.gif">',$texte);
	$texte=str_replace(":'(",'<img src="http://www.serialdealer.eu/smiley/mouhai.gif">',$texte);
	$texte=str_replace(":|",'<img src="http://www.serialdealer.eu/smiley/sigh.gif">',$texte);
	$texte=str_replace(";)",'<img src="http://www.serialdealer.eu/smiley/tehteh.gif">',$texte);
	$texte=str_replace(":(",'<img src="http://www.serialdealer.eu/smiley/triste.gif">',$texte);
	$texte=str_replace(":[",'<img src="http://www.serialdealer.eu/smiley/waant.gif">',$texte);
	return($texte);
}

// Affiche les liens dans un texte
function autolinkdeal($text){
	return preg_replace_callback('#((https?://)[-a-zA-Z0-9@:%_,\+.~\#\[\]\$\|\€\!\{\}\;?&//=]+)#','callbackdeal',$text);
}

// Affiche les liens dans un texte
function autolink($text){
	if(stristr($text, '.jpg') == TRUE ||stristr($text, '.jpeg') == TRUE ||  stristr($text, '.gif') == TRUE  ||  stristr($text, '.png') == TRUE) return preg_replace_callback('#((http://)[-a-zA-Z0-9@:%_,\+.~\#\[\]\;?&//=]+)#',
create_function('$matches', 'return \'<img src="\'
		.$matches[1]
		.\'" >\';'),        $text);
	else if( stristr($text, 'http:') == TRUE && stristr($text, 'imm.io') == TRUE ) return preg_replace_callback('#((http://)[-a-zA-Z0-9@:%_,\+.~\#\[\]\$\|\€\!\{\}\;?&//=]+)#',
	create_function('$matches', 'return \'<img src="\'
		.$matches[1]
		.\'" >\';'),        $text);
	else if(stristr($text, '.pdf') == TRUE ) return preg_replace_callback('#((http://)[-a-zA-Z0-9@:%_\+.~\#\[\]\$\|\€\!\;?&//=]+)#',
	create_function('$matches',
	'return \'<a href="http://www.serialdealer.fr/r.php?url=\'
	. urlencode($matches[1])
	. \'" target="_blank">\'
			.liens_plus_courts($matches[1]).
			\'</a>\';'),
	$text);
	else if(stristr($text, 'http:') == TRUE && (stristr($text, 'dealabs.com') == FALSE && stristr($text, 'hamster-joueur.com') == FALSE && stristr($text, 'bonplangamer.com') == FALSE  && stristr($text, 'plusdebonsplans.com') == FALSE&& stristr($text, 'imm.io') == FALSE  && stristr($text, 'hotukdeals.com') == FALSE )) return preg_replace_callback('#((http://)[-a-zA-Z0-9@:%_,\+.~\#\[\]\$\|\€\!\{\}\;?&//=]+)#',
	create_function('$matches',
	'return \'<a href="http://www.serialdealer.fr/r.php?url=\'
	. urlencode($matches[1])
	. \'" target="_blank">\'
		.liens_plus_courts($matches[1]).
			\'</a>\';'),
	$text);

	else if(stristr($text, 'https:') == TRUE ) return preg_replace_callback('#((https://)[-a-zA-Z0-9@:%_,\+.~\#\€\[\]\{\}\;?&//=]+)#',
	create_function('$matches',
	'return \'<a href="http://www.serialdealer.fr/r.php?url=\'
	. urlencode($matches[1])
	. \'" target="_blank">\'
		.liens_plus_courts($matches[1]).
			\'</a>\';'),
	$text);

	else return($text);
}

// Citer un autre commentaire
function citer($message){
	$message1=$message;
	$texte='<blockquote>
<table width="504" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#F9F9F9"><table width="581" border="0">
      <tr>
        <td width="575" class="texte_gris"><a href="profil_[pseudo].htm" class="texte_gris"><strong>[pseudo]</strong></a> a &eacute;crit:</td>
        </tr>
      <tr>
        <td class="lien_gris"><img src="/images/spacer.gif" width="1" height="1" /></td>
        </tr>
      <tr>
        <td class="lien_gris">[message]</td>
        </tr>
  </table></td>
    </tr>
</table>
</blockquote><p>
[message2]
</p>';

	$message=str_replace("[.qm1]",'<blockquote>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
 <tr>

    <td bgcolor="#F9F9F9">

	<table width="99%" border="0">
      <tr> <td width="1" bgcolor="#B9B9B9"><img src="/images/spacer.gif" width="1" height="1" /></td>
        <td  class="texte_gris"><strong>',$message);
	$message=str_replace("[.qm2]",	'</strong></a> a &eacute;crit:</td>
        </tr>
      <tr>
        <td  colspan="2" class="lien_gris"><img src="/images/spacer.gif" width="1" height="1" /></td>
        </tr>
      <tr><td width="1" bgcolor="#B9B9B9"><img src="/images/spacer.gif" width="1" height="1" /></td>
        <td class="lien_gris">',$message);
	$message=str_replace("[.qm3]",	'</td>
        </tr>
  </table>

  </td>

	</tr>
</table>
</blockquote>',$message);


	if(stristr($message1, '[.qm1]') == TRUE && stristr($message1, '[.qm2]') == TRUE && stristr($message1, '[.qm3]') == TRUE )return($message); else return($message1);
}

// Raccourcir les liens
function liens_plus_courts($lien_a_raccourcir){
	return preg_replace( '`^([a-zA-Z0-9._]{20})(.+)([a-zA-Z0-9._]{17})$`', '$1...$3' , $lien_a_raccourcir);
}

// Fonction nécessaire à autolink
function callbackdeal($matches){

	if(  stristr($matches[1], '.jpg') == TRUE || stristr($matches[1], '.jpeg') == TRUE || (stristr($matches[1], '.gif') == TRUE && stristr($matches[1], '.gifi') == FALSE)|| stristr($matches[1], '.png') == TRUE){ return '<div class=\"imgmini\"><a href=\"'.$matches[1].'\" target=\"_blank\"><img src="' .str_replace('https','http',$matches[1]). '" /></a></div>'; }

	elseif(stristr($matches[1], '.pdf') == TRUE){ return '<a href="'.($matches[1]).'" target="_blank">'.($matches[1]).'</a>'; }

	elseif( stristr($matches[1], 'serialdealer.fr') == TRUE ){ return '<a href="'.($matches[1]).'">'.liens_plus_courts($matches[1]).'</a>'; }

	elseif( stristr($matches[1], 'dealabs.com') == TRUE || stristr($matches[1], 'hamster-joueur.com') == TRUE || stristr($matches[1], 'bonplangamer.com') == TRUE  || stristr($matches[1], 'plusdebonsplans.com') == TRUE  || stristr($matches[1], 'hotukdeals.com') == TRUE ) { return $matches[1]; }

	else {
		return '<a href="http://www.serialdealer.fr/r.php?url='.urlencode($matches[1]).'" target="_blank">'.liens_plus_courts($matches[1]).'</a>';
	}
}

// Envoi de mail
function email($destinataire, $sujet , $message_texte, $message_html,$email_expediteur="noreply@serialdealer.fr",$site="Serial Dealer"){
	$email_reply=$email_expediteur;

	//-----------------------------------------------
	//GENERE LA FRONTIERE DU MAIL ENTRE TEXTE ET HTML
	//-----------------------------------------------
	$frontiere = '-----=' . md5(uniqid(mt_rand()));
	//-----------------------------------------------
	//HEADERS DU MAIL
	//-----------------------------------------------
	$headers = 'From: '.$site.' <'.$email_expediteur.'>'."\n";
	$headers .= 'Return-Path: <'.$email_reply.'>'."\n";
	$headers .= 'MIME-Version: 1.0'."\n";
	$headers .= 'Content-Type: multipart/alternative; boundary="'.$frontiere.'"';
	//-----------------------------------------------
	//MESSAGE TEXTE
	//-----------------------------------------------
	$message = 'This is a multi-part message in MIME format.'."\n\n";
	$message .= '--'.$frontiere."\n";
	$message .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n";
	$message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
	$message .= "Message de Serial Dealer\n\n";
	//-----------------------------------------------
	//MESSAGE HTML
	//-----------------------------------------------
	$message .= '--'.$frontiere."\n";
	$message .= 'Content-Type: text/html; charset="iso-8859-1"'."\n";
	$message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
	$message .= $message_html."\n\n";
	$message .= '--'.$frontiere.'--'."\n";
	return @mail($destinataire,$sujet,$message,$headers);
}
?>