$(function() {
	$("#drag, #drop").sortable({
		connectWith : ".connected",
		receive : function(event, ui) {
			//console.log(ui.item.find("img").attr("data-prix"));
			calcul_panier();
		}
	}).disableSelection();

	$("#qrcode").qrcode({
		"render" : "image",
		"size" : 150,
		"text" : "http://10.0.1.31:8888/dragdrop/assets/img/ballons/football.png"
	});

});

function calcul_panier() {
	var total = 0;
	$('#panier').empty();
	$('#total').empty();
	$("#drop").find("img").each(function(index) {
		total += parseFloat($(this).attr("data-prix"));
		//console.log("+ " + $(this).attr("data-prix") + "€");
		if (index == 0)
			$('#panier').append($(this).attr("data-libelle") + ": " + $(this).attr("data-prix") + "€<br>");
		else
			$('#panier').append("+ " + $(this).attr("data-libelle") + ": " + $(this).attr("data-prix") + "€<br>");
	});
	total = Math.round(total * 100) / 100;
	//console.log("Total: " + total + "€");
	if (total != 0)
		$('#total').html("Total: " + total + "€");
}