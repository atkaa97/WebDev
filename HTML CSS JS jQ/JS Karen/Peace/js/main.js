/********************************************************************************************************
***start loading
*********************************************************************************************************/
setTimeout(function(){
	$("#load").fadeOut(200, function(){
		$(this).remove()
		$("#dollar").animate({
			"left":0,
		})
	})
},200)
/********************************************************************************************************
***header clicks
*********************************************************************************************************/
var plusOrMinus = false;
$(".minus_plus").click(function(){
	if(plusOrMinus==false){
		$(".minus_plus").children().text("+");
		$("#div_for_first_navbar").css("margin-top", "-43px")
		plusOrMinus=true
	}else{
		$(".minus_plus").children().text("-");
		$("#div_for_first_navbar").css("margin-top", "0")
		plusOrMinus=false
	}
})

$(".dropdown").click(function(e){
	$(".dropdown_menu").fadeToggle(500);
	e.stopPropagation();																									//learn
})
$("body").click(function(){
	$(".dropdown_menu").fadeOut(500);
})
/********************************************************************************************************
***navbar clicks
*********************************************************************************************************/
var menuClicke = false;
$('a').click(function(e){																									//learn
		e.preventDefault(); 
	})
$(".navbar_item").click(function(){
	var fileName = $(this).attr("name");
	document.location.hash = fileName;																						//learn
	if (!$(".pages").is(':animated')){
		if(menuClicke == false){
			$("#dollar").animate({
					"left":"100vw",
				}, 600, function(){
					$('.white').css('border-top','26px solid #b64926');
					$(".white").animate({
						"height" : "650px",
						"margin-top": "-650px"
					}, 600)
					$(".background").animate({
						"top": "-430px"
					}, 600, function(){
							$(".pages").load(fileName+'.html');
							$(".pages").animate({
							"left" : "0px"
						}, 600)
					})
				})
			menuClicke = true;
		}else{
			if (!$(this).hasClass("checked_item")) {
				$(".pages").animate({
					"left":"100vw"
				}, 600, function(){
					$(".pages").animate({
					"left":"-100vw"
					},0, function(){
						$(".pages").load(fileName+'.html')
						$(".pages").animate({
						"left":"0"
						}, 600)
					})
				})
			}
		}
	}
	$(".navbar_item").removeClass("checked_item");
	$(this).addClass("checked_item");
})
$('#header').click(function(){
	menuClicke = false;
	$(".pages").animate({
		"left":"100vw"
	}, 600, function(){
		$(".navbar_item").removeClass("checked_item");
		$(".background").animate({
			"top": "0px"
		},600)
		$(".white").animate({
			"height": "0px",
			"margin-top":"0px"
		},600, function(){
			$('.white').css('border-top','none');
			$("#dollar").animate({
				"left":"0"
			}, 300)
			$('.pages').css('left','-100vw')
		})
	})
})

/********************************************************************************************************
***contact clicks
*********************************************************************************************************/
$(document).on('focus', '.input', function(){
	val = $(this).val()
	attr = $(this).attr("value")
	$(this).prev().fadeOut();
	if (val == attr){
		$(this).val("");
	};
});
$(document).on('blur', '.input', function(){
	 $(".input").each(function(){
	 	if ($(this).val() == "") {
	 		$(this).val(attr);
	 		$(this).prev().fadeIn();
	 	};
    });
});