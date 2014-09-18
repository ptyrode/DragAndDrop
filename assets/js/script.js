$(function() {
	$("#drag, #drop").sortable({
		connectWith : ".connected",
		receive : function(event, ui) {
			//console.log(ui.item.find("img").attr("data-prix"));
			calcul_panier();
		}
	}).disableSelection();

	jQuery.urlShortener.settings.apiKey = 'AIzaSyCe1pMndOIp-0NKffYcEDDjkefoA6LuY6o';
	$('#msg').delay(2000).hide(0);
	$('#adresse2').hide();
	$('#adresse3').hide();

	$('#checkbox2').change(function() {
		if ($(this).is(":checked"))
			$('#adresse2').hide();
		else
			$('#adresse2').show();
	});
	$('#checkbox3').change(function() {
		if ($(this).is(":checked"))
			$('#adresse3').hide();
		else
			$('#adresse3').show();
	});
	$('.livraison').on('shown.bs.tab', function(e) {
		init_carte();
	});
	$('input:radio').change(function() {
		console.log($(this).attr("id"));
		
	});
});

function init_carte() {
	// On vérifie si le navigateur supporte la géolocalisation
	if (navigator.geolocation) {

		function get_position(position) {
			// Instanciation
			var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),

			// Ajustage des paramètres
			myOptions = {
				zoom : 15,
				center : point,
				mapTypeId : google.maps.MapTypeId.ROADMAP
			},

			// Envoi de la carte dans la div
			mapDiv = document.getElementById("map-canvas"), map = new google.maps.Map(mapDiv, myOptions), marker = new google.maps.Marker({
				position : point,
				map : map,
				title : "Vous êtes ici"
			});
			var infowindow;
			var zoneMarqueurs = new google.maps.LatLngBounds();
			var nbr = 1;
			$("#relais").find("input").each(function(index) {
				var image = new google.maps.MarkerImage('../assets/img/relais.png');
				lat = $(this).attr("data-latitude");
				lng = $(this).attr("data-longitude");
				var marker = new google.maps.Marker({
					position : new google.maps.LatLng(lat, lng),
					map : map,
					title : $(this).attr("value"),
					icon : image
				});
				marker.set("id", "option"+nbr);
				zoneMarqueurs.extend(marker.getPosition());
				var infowindow = new google.maps.InfoWindow({
					content : $(this).attr("value"),
					size : new google.maps.Size(100, 100)
				});
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.close();
					infowindow.open(map, marker);
					console.log(marker.get("id"));
					jQuery("#" + marker.get("id")).attr('checked', 'checked');
				});
				console.log(nbr);
				nbr++;
			});

			map.fitBounds(zoneMarqueurs);
		}


		navigator.geolocation.getCurrentPosition(get_position);
	}
}

function calcul_panier() {
	var total = 0;
	var nb = 0;
	$('#nb').val("0");
	$('#panier').empty();
	$('#total').empty();
	$('#qrcode').empty();
	$("#drop").find("img").each(function(index) {
		nb++;
		total += parseFloat($(this).attr("data-prix"));
		$('#panier').append("<input type=\"hidden\" class=\"form-control\" name=\"produit" + nb + "\" value=\"" + $(this).attr("data-libelle") + "\">" + "<span class=\"spgauche\">" + $(this).attr("data-libelle") + " : </span><span class=\"spdroite\">" + $(this).attr("data-prix") + " $</span><br>");
	});
	total = Math.round(total * 100) / 100;
	if (total != 0) {
		$('#panier').append("<input type=\"hidden\" class=\"form-control\" name=\"total\" value=\"" + total + "\">" + "<br><span class=\"spgauche\">Total : </span><span class=\"spdroite\">" + total + " $</span>");
		//$('#panier').append("<br><span class=\"spgauche\">Total : </span><span class=\"spdroite\">" + total + " $</span><br>");
		$('#nb').val(nb);
		//console.log(nb);
		short_url();
	}
}

function short_url() {
	jQuery.urlShortener({
		longUrl : "http://10.0.1.31:8888/dragdrop/commandes/recapitulatif.php?id=" + $('#id').val() + "&nb=" + $('#nb').val() + "&data=" + $('#panier').html(),
		success : function(shortUrl) {
			genere_qrcode(shortUrl);
		},
		error : function(err) {
			console.log(JSON.stringify(err));
		}
	});
}

function genere_qrcode(url) {
	$('#qrcode').empty();
	$("#qrcode").qrcode({
		"render" : "image",
		"size" : 150,
		"text" : url
	});
	console.log(url);
	$('#qrcode').append("<a href=\"" + url + "\" class=\"btn btn-large\">Valider</a>");
}