$(function() {
	$("#drag, #drop").sortable({
		connectWith : ".connected",
		receive : function(event, ui) {
			//console.log(ui.item.find("img").attr("data-prix"));
			calcul_panier();
		}
	}).disableSelection();
	jQuery.urlShortener.settings.apiKey = 'AIzaSyCe1pMndOIp-0NKffYcEDDjkefoA6LuY6o';
});

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
		$('#panier').append("<input type=\"hidden\" class=\"form-control\" name=\"produit" + nb + "\" value=\"" + $(this).attr("data-libelle") + "\">" + "</div>" + "<span class=\"spgauche\">" + $(this).attr("data-libelle") + " : </span><span class=\"spdroite\">" + $(this).attr("data-prix") + " $</span><br>");
	});
	total = Math.round(total * 100) / 100;
	if (total != 0) {
		$('#panier').append("<br><span class=\"spgauche\">Total : </span><span class=\"spdroite\">" + total + " $</span><br>");
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
}