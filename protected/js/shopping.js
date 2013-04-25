$(function(){

    $('.itemBlcok').click(function() {
    	alert("im in");
    	//alert("gs_objectId="+gs_objectId);
    });
	
	$('.itemBlock').hover(
		 function () {
            $(this).find('article').animate({opacity:'1'});
        },
        function () {
            $(this).find('article').animate({opacity:'0'});
        }
 	);
	
	// remove goods from shopping cart by goods id
	$('.removeCart').livequery('click', function() {
		var goodsId = $(this).parent().children(".cartID").val();
		$('html, body').css("cursor", "wait");
		$.post("/protected/php/shopping.php?&jsAction=delItem", {id:goodsId}, function(data)
    	{
			//console.log("before is "+data);
			data = eval("(" + data + ")");
			$('#shoppingSum').html(data.data);
			$('#shoppingList').html(data.html);
    	}).done(function() { 
				// to add
				$('html, body').css("cursor", "auto");
    	}).fail(function() { 
    			alert("Error when delete item.");
    			$('html, body').css("cursor", "auto");
    	}); 
		
	});	// end of removeCart

});

function addTest(el, goodsId, goodsName, goodsPrice, goodsFormat) {
	// loading animation
	var loadingBox = new ajaxLoader(el.parent().parent());

//	alert('id is '+goodsId+' and name is '+goodsName+' and price is '+goodsPrice+' and format is '+goodsFormat);
	$.post("/protected/php/shopping.php?&jsAction=addGoods", 
		{ id:goodsId, name:goodsName, price:goodsPrice, format:goodsFormat }, function(data)
    {
		// to add
		data = eval("(" + data + ")");
		//console.log("data is "+data);
		$('#shoppingSum').html(data.data);
		$('#shoppingList').html(data.html);
    }).done(function() { 
    	loadingBox.remove();
    	$('html, body').css("cursor", "auto");
	}).fail(function() { 
		alert("Error");
		$('html, body').css("cursor", "auto");
	});
}

// add goods to shopping cart
function addGoods(divId){
	$('html, body').css("cursor", "wait");
	
	var goods = '#'+divId;
	var goodsId = $(goods+" input.goodsId").val();
	var goodsName = $(goods+" input.goodsName").val();
	var goodsPrice = $(goods+" input.goodsPrice").val();
	var goodsFormat = $(goods+" input.goodsFormat").val();

	$.post("/protected/php/shopping.php?&jsAction=addGoods", 
		{ id:goodsId, name:goodsName, price:goodsPrice, format:goodsFormat }, function(data)
    {
		// to add
		data = eval("(" + data + ")");
		//console.log("data is "+data);
		$('#shoppingSum').html(data.data);
		$('#shoppingList').html(data.html);
    }).done(function() { 
    	alert("done");
    	$('html, body').css("cursor", "auto");
	}).fail(function() { 
		alert("Error");
		$('html, body').css("cursor", "auto");
	}); 
	
	
/*	jQuery.ajax ({
    url: "/index.php?p=shopping&jsAction=addGoods",
    type: "POST",
    data: { id:goodsId, name:goodsName, price:goodsPrice, format:goodsFormat },
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function(){
        alert("done");
    },
    error: function () {
		alert("Error");
    }
}); */
}


/*
* Ajax overlay 1.0
* Author: Simon Ilett @ aplusdesign.com.au
* Descrip: Creates and inserts an ajax loader for ajax calls / timed events 
* Date: 03/08/2011 
*/
function ajaxLoader (el, options) {
	// Becomes this.options
	var defaults = {
		bgColor 		: '#fff',
		duration		: 800,
		opacity			: 0.7,
		classOveride 	: false
	}
	this.options 	= jQuery.extend(defaults, options);
	this.container 	= $(el);
	
	this.init = function() {
		var container = this.container;
		// Delete any other loaders
		this.remove(); 
		// Create the overlay 
		var overlay = $('<div></div>').css({
				'background-color': this.options.bgColor,
				'opacity':this.options.opacity,
				'width':container.width(),
				'height':container.height(),
				'position':'absolute',
				'top':'0px',
				'left':'0px',
				'z-index':99999
		}).addClass('ajax_overlay');
		// add an overiding class name to set new loader style 
		if (this.options.classOveride) {
			overlay.addClass(this.options.classOveride);
		}
		// insert overlay and loader into DOM 
		container.append(
			overlay.append(
				$('<div></div>').addClass('ajax_loader')
			).fadeIn(this.options.duration)
		);
    };
	
	this.remove = function(){
		var overlay = this.container.children(".ajax_overlay");
		if (overlay.length) {
			overlay.fadeOut(this.options.classOveride, function() {
				overlay.remove();
			});
		}	
	}

    this.init();
}