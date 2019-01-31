//                      							 Variables
// ==================================================================================================================================================
var i, j, c, z, r, q, level, size, index;
var m = 1, k=[], myArr=[], myTableContent="", win = bombCount = 0;

//                      							 Functions
// ==================================================================================================================================================
function openAround(i) {
	if ($("td[name="+i+"]").css("background-color") != 'rgb(255, 0, 0)') {
		$("td[name="+i+"]").css("opacity", 1);
		$("td[name="+i+"]").removeClass('red_border');
	};
}

function addBombCount(i) {
	return ($("td[name="+i+"]").css("background-color") == 'rgb(255, 0, 0)') ? 1 : 0 ;
}

function setBombCount(bombCount, j) {
	if (bombCount>0) {
		$("td[name="+j+"]").text(bombCount);
		$("td[name="+j+"]").css("background-color", "green")
	}
}

//                      							 Default Settings And Adding Bomb Count
// ==================================================================================================================================================
$(".btn").click(function(){
	$(".sett").hide();
	$(".start").show();	
	level = parseInt($(".level").val());
	size = parseInt($(".size").val());
	c = r = size;

	for (i = 0; i < size; i++) {
		myTableContent += '<tr class="row">';
		for (j = 0; j < size; j++) {
			myTableContent += '<td class="item" name="'+m+'"></td>';
			m++;
		}
		myTableContent += '</tr>';
	}

	$(".my_table").html(myTableContent); myTableContent = "";

	for (i = 0; i < level; i++) {myArr.push("red")}
	for (i = 0; i < size*size - level; i++) {myArr.push("blue")}
	myArr.sort(function() { return 0.5 - Math.random() });

	for (i = 1; i <= c*r; i++) {k.push(i)};	q = k ;

	$( ".item" ).contextmenu(function() {
		if ($(this).css("opacity") == 0) {
			  $(this).toggleClass('red_border');
		}
	});

	$(".item").each(function(){
		var index = $(this).attr('name');
		if ($(this).css("background-color") === 'rgba(0, 0, 0, 0)' || $(this).css("background-color") === 'transparent') {
				$(this).addClass( myArr[index-1]);
		};
	});

	//                       Left-top
	// ==========================================================================================
	j = 1;
	k = jQuery.grep(k, function(value) { return value != j;});
	if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {
		i = j + 1;			bombCount += addBombCount(i);
		i = i + c;			bombCount += addBombCount(i);
		i = i - 1;			bombCount += addBombCount(i);
		setBombCount(bombCount, j);
		bombCount = 0 ;
	}
	//                       Right-top
	// ==========================================================================================
	j = c;
	k = jQuery.grep(k, function(value) { return value != j;});
	if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {
		i = j - 1;			bombCount += addBombCount(i);
		i = i + c;			bombCount += addBombCount(i);
		i = i + 1;			bombCount += addBombCount(i);
		setBombCount(bombCount, j);
		bombCount = 0 ;
	}
	//                       Right-bot
	// ==========================================================================================
	j = c*r;
	k = jQuery.grep(k, function(value) { return value != j;});
	if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {
		i = j - c;			bombCount += addBombCount(i);
		i = i - 1;			bombCount += addBombCount(i);
		i = i + c;			bombCount += addBombCount(i);
		setBombCount(bombCount, j);
		bombCount = 0 ;
	}
	//                       Left-bot
	// ==========================================================================================
	j = c*r-c+1;
	k = jQuery.grep(k, function(value) { return value != j;});
	if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {
		i = j - c;			bombCount += addBombCount(i);
		i = i + 1;			bombCount += addBombCount(i);
		i = i + c;			bombCount += addBombCount(i);
		setBombCount(bombCount, j);
		bombCount = 0 ;
	}
	//                       Top
	// ==========================================================================================
	for ( j = 2; j < c; j++) {	
		k = jQuery.grep(k, function(value) { return value != j;});
		if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {	
			i = j - 1;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			i = i - c;		bombCount += addBombCount(i);
			setBombCount(bombCount, j);
			bombCount = 0 ;
		};
	};
	//                       Right
	// ==========================================================================================
	for ( j = c*2; j < c*r; j+=c) {
		k = jQuery.grep(k, function(value) { return value != j;});	
		if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {	
			i = j - c;		bombCount += addBombCount(i);
			i = i - 1;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			setBombCount(bombCount, j);
			bombCount = 0 ;
		};
	};
	//                       Bottom
	// ==========================================================================================
	for ( j = c*r-c+2; j < c*r; j++) {
		k = jQuery.grep(k, function(value) { return value != j;});
		if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {	
			i = j - 1;		bombCount += addBombCount(i);
			i = i - c;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			setBombCount(bombCount, j);
			bombCount = 0 ;
		};
	};
	//                       Left
	// ==========================================================================================
	for ( j = c+1; j < (r-1)*c; j+=c) {
		k = jQuery.grep(k, function(value) { return value != j;});
		if ($("td[name="+j+"]").css("background-color") !== 'rgb(255, 0, 0)') {	
			i = j - c;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			i = i - 1;		bombCount += addBombCount(i);
			setBombCount(bombCount, j);
			bombCount = 0 ;
		};
	};
	//                       Inside
	// ==========================================================================================
	for ( j = 0; j < k.length ; j++) {
		if ($("td[name="+k[j]+"]").css("background-color") !== 'rgb(255, 0, 0)') {	
			i = k[j] - c;	bombCount += addBombCount(i);
			i = i - 1;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			i = i + c;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			i = i + 1;		bombCount += addBombCount(i);
			i = i - c;		bombCount += addBombCount(i);
			i = i - c;		bombCount += addBombCount(i);
			setBombCount(bombCount, k[j]);
			bombCount = 0 ;
		};
	};

	//                      							 Open Around After Click
	// ==================================================================================================================================================
	$('.item').click(function(){
		$(this).removeClass('red_border');
		if ($(this).css("opacity") == 0) {
			$(this).css("opacity", 1);

			if($(this).css("background-color") == 'rgb(255, 0, 0)'){
				alert("You Lose !!!");
				$(".item").each(function(){
					$(this).removeClass('red_border');
					$(this).css("opacity", 1);
				});
				$(this).css("background-color", 'rgb(0, 0, 0)');
				return false;
			}
			else if ($(this).css("background-color") == 'rgb(0, 0, 255)') {
				for (z = 0; z < size; z++) {
					$(".item").each(function(){
						index = parseInt($(this).attr('name'));
						//                       Left-top
						// =========================================================================================
						if (index == 1 && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
							q = jQuery.grep(q, function(value) { return value != index;});
							i = index + 1;		openAround(i);
							i = i + c;			openAround(i);
							i = i - 1;			openAround(i);
						}
						//                       Right-top
						// ==========================================================================================
						if (index == c && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
							q = jQuery.grep(q, function(value) { return value != index;});
							i = index - 1;		openAround(i);
							i = i + c;			openAround(i);
							i = i + 1;			openAround(i);
						}
						//                       Right-bot
						// ==========================================================================================
						if (index == c*r && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
							q = jQuery.grep(q, function(value) { return value != index;});
							i = index - c;		openAround(i);
							i = i - 1;			openAround(i);
							i = i + c;			openAround(i);
						}
						//                       Left-bot
						// ==========================================================================================
						if (index == c*r-c+1 && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
							q = jQuery.grep(q, function(value) { return value != index;});
							i = index - c;		openAround(i);
							i = i + 1;			openAround(i);
							i = i + c;			openAround(i);;
						}
						//                       Top
						// ==========================================================================================
						for ( j = 2; j < c; j++) {
							if (index == j && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
								q = jQuery.grep(q, function(value) { return value != index;});

	
								i = j - 1;		openAround(i);
								i = i + c;		openAround(i);
								i = i + 1;		openAround(i);
								i = i + 1;		openAround(i);
								i = i - c;		openAround(i);
							};
						}

						//                       Right
						// ==========================================================================================
						for (j = c*2; j < c*r; j+=c) {
							if (index == j && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
								q = jQuery.grep(q, function(value) { return value != index;});	
								i = j - c;		openAround(i);
								i = i - 1;		openAround(i);
								i = i + c;		openAround(i);
								i = i + c;		openAround(i);
								i = i + 1;		openAround(i);
							};
						}
						//                       Bottom
						// ==========================================================================================
						for (j = c*r-c+2; j < c*r; j++) {
							if (index == j && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
								q = jQuery.grep(q, function(value) { return value != index;});	
								i = j - 1;		openAround(i);
								i = i - c;		openAround(i);
								i = i + 1;		openAround(i);
								i = i + 1;		openAround(i);
								i = i + c;		openAround(i);
							};
						}
						//                       Left
						// ==========================================================================================
						for (j = c+1; j < (r-1)*c; j+=c) {
							if (index == j && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
								q = jQuery.grep(q, function(value) { return value != index;});		
								i = j - c;		openAround(i);
								i = i + 1;		openAround(i);
								i = i + c;		openAround(i);
								i = i + c;		openAround(i);
								i = i - 1;		openAround(i);
							};
						}
						//                       Inside
						// ==========================================================================================
						for ( j = 0; j < k.length ; j++) {
							if (index == k[j] && q.indexOf(index) != -1 && $(this).css("background-color") == 'rgb(0, 0, 255)' &&  $(this).css("opacity") == 1) {
								q = jQuery.grep(q, function(value) { return value != index;});
								i = k[j] - c; 	openAround(i);
								i = i - 1;   	openAround(i);
								i = i + c;		openAround(i);
								i = i + c;		openAround(i);
								i = i + 1;		openAround(i);
								i = i + 1;		openAround(i);
								i = i - c;		openAround(i);
								i = i - c;		openAround(i);
							};
						};	
					});
				};
			};
			win = 0;
			$(".item").each(function(){	
				if ($(this).css("opacity") == 1) {
				win++;
				};
				if (win == size*size - level) {
					$(".item").each(function(){
						$(this).removeClass('red_border');
						$(this).css("opacity", 1);
					});
					alert("You Win !!!");
				};
			});
		};
	});
});