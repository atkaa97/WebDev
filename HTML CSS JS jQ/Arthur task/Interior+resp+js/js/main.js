var navTop, scrollValue, artTop, newsTop, beautifyingTop, asideTop;

setTimeout(function() {
    $(".add").addClass("left_0")
}, 250)

navTop = $("nav").offset().top;

$(window).scroll(function (event) {
    scrollValue = $(window).scrollTop();

    if (scrollValue >= navTop) {
    	$(".list_item").addClass("list_item_scroll")
    	$("nav").addClass("nav_fixed")
    }else{
    	$(".list_item").removeClass("list_item_scroll")
    	$("nav").removeClass("nav_fixed")}

// $(window).on('load', function () {
//   $(".add").addClass("left_0")
// });
// if (scrollValue >= addTop-$(window).height()+150) {

	var artTop = $("#art").offset().top;
	if (scrollValue >= artTop-600) {
		$(".article").each(function(e){
			var x = $(this)
			setTimeout(function() {
    			x.addClass("left_0")
			}, 100*e)
		})
	}

	var welcomeTop = $("#welcome").offset().top;
	if (scrollValue >= welcomeTop-600) {
		$(".welcome_item_content").each(function(e){
			var y = $(this)
			setTimeout(function() {
    			y.addClass("left_0")
			}, 150*e)
		})
	}

	var newsTop = $("#news").offset().top;
	if (scrollValue >= newsTop-450) {
		$(".our_news_content_ul_content").addClass("left_0")
		setTimeout(function() {
    				$(".our_news_content_text_content").addClass("left_0")
			}, 150)
	}

	var beautifyingTop = $("#news").offset().top;
	if (scrollValue >= beautifyingTop-250) {
		$(".beautifying_content").addClass("left_0")
	}

	var asideTop = $("#news").offset().top;
	if (scrollValue >= asideTop-350) {
		$(".aside_content").addClass("left_0")
	}
/*
*****************************
*     =.go_up
*****************************
*/
	if (scrollValue >= 200) {
		$(".go_up").fadeIn("slow")
	}else{
		$(".go_up").fadeOut("slow")
	}

	$(".go_up").click(function(){
		$("body").stop().animate({scrollTop:0}, 500)
	})
})
