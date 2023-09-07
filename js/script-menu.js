$(document).ready(function() {
	var lmin = 3
	if($(".promospage .slick-slide").length <= lmin){
		$(".promospage .slick-track").removeClass('slick-track-full')
		$(".promospage .slick-track").addClass('slick-track-full')
	}
	if($(".promospage .slick-slide").length <= lmin){
		$(".promospage .slick-track").removeClass('slick-track-center')
		$(".promospage .slick-track").addClass('slick-track-center')
	}
	/*if (screen.width <= 991.98) {
		console.log('test menu')
		var sub_station = document.getElementById("sub_station");
		var lavage_station = document.getElementById("lavage_station");
		var l_produit = document.getElementById("l_produit");
		var c_marche = document.getElementById("c_marche");
		sub_station.style.display = "none";
		lavage_station.style.display = "none";
		l_produit.style.display = "none";
		c_marche.style.display = "none";
		$('#n_station').click(function(e) {
			l_produit.style.display = "none";
			c_marche.style.display = "none";
			if (sub_station.style.display === "block") {
			    sub_station.style.display = "none";
			 } else {
			    sub_station.style.display = "block";
			 }
		})

		$('#child_station').click(function(e) {
			l_produit.style.display = "none";
			c_marche.style.display = "none";
			if (lavage_station.style.display === "block") {
			    lavage_station.style.display = "none";
			 } else {
			    lavage_station.style.display = "block";
			 }
		})

		$('#n_carburant').click(function(e) {
			sub_station.style.display = "none";
			lavage_station.style.display = "none";
			c_marche.style.display = "none";
			if (l_produit.style.display === "block") {
			    l_produit.style.display = "none";
			 } else {
			    l_produit.style.display = "block";
			 }
		})

		$('#c_energy').click(function(e) {
			sub_station.style.display = "none";
			lavage_station.style.display = "none";
			l_produit.style.display = "none";
			if (c_marche.style.display === "block") {
			    c_marche.style.display = "none";
			 } else {
			    c_marche.style.display = "block";
			 }
		})
	}*/
    if (screen.width <= 991.98) {
        /*$('.i_chil').css('display', 'none');
        $('.i_c_chil').css('display', 'none');*/
        menuP = (key,event) => {
			var sub_station = document.getElementById("sub_station"+key);
            $("#sub_station"+key).attr("data-display",$("#sub_station"+key).css("display"));
            $("*[id^=sub_station]").css("display", "none");
            $("*[id^=lavage_station]").css("display", "none");
            if($("#sub_station"+key).attr("data-display") == "block") {
                $("#sub_station"+key).css("display", "none");
            }else {
                $("#sub_station"+key).css("display", "block");
            }
        };
        childF = (key,event) => {
			var lavage_station = document.getElementById("lavage_station"+key);
            $("#lavage_station"+key).attr("data-display",$("#lavage_station"+key).css("display"));
            $("*[id^=lavage_station]").css("display", "none");
            if($("#lavage_station"+key).attr("data-display") == "block") {
                $("#lavage_station"+key).css("display", "none");
            }else {
                $("#lavage_station"+key).css("display", "block");
            }
        };
    }
})
   /* window.addEventListener('load',() =>{
    });*/