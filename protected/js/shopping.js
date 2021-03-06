$(document).ready(function(){
	var goodsIDs = new Array();
	
	var children=$('#shoppingList .ordersList').children();
	$('#shoppingList .ordersList').children().each(function(index, val){
   		//console.log('id is '+$(this).find('.cartID').val()+' idx is '+index+' val is '+val);
   		goodsIDs.push($(this).find('.cartID').val());
	});
	
	$('.addToCartButton').click(function(){
	//	console.log("ids are " + goodsIDs);
		var father = $(this).closest('.item');
		var loadingBox = new ajaxLoader(father);
		var itemID = father.children('.goodsID').val();
		var itemName = father.find('.goodsName').html();
		var itemPrice = father.find('.goodsPrice').html() * 1; 
		
		$.post("/protected/php/shopping.php?&jsAction=addGoods", 
		{ id:itemID, name:itemName, price:itemPrice}, 
		function(data){}).done(function() { 
			//console.log($.inArray(itemID, goodsIDs));
			if($.inArray(itemID, goodsIDs) > -1){
				var quantity = parseInt($('#item-'+itemID).children('.cartQuantity').html());
				$('#item-'+itemID).children('.cartQuantity').html(quantity+1);
			} else {
				goodsIDs.push(itemID);
				//	var html = '<div class="cartInfo"><div id="item-'+ itemID +'" class="cartDetail"><input class="cartID" value='+ itemID +'><div class="cartName">'+ itemName +'</div><div class="cartPrice">'+ itemPrice +'元</div><span class="cartQuantity">1</span><img src="/protected/images/remove.png" class="removeCart" title="删除"/><br></div></div>';
				$('#shoppingList .ordersList').append('<div class="cartInfo"><div id="item-'+ itemID +'" class="cartDetail"><input class="cartID" value='+ itemID +'><div class="cartName">'+ itemName +'</div><div class="cartPrice"><span class="getPrice">'+ itemPrice.toFixed(2) +'</span>&nbsp元</div><span class="cartQuantity">1</span><img src="/protected/images/remove.png" class="removeCart" title="删除"/><br></div></div>');				
			}
			var total = $('#priceSum').html() * 1;
			$('#priceSum').html((total+itemPrice).toFixed(2));
			var sum = parseInt($('#shoppingSum').html()) + 1;
			$('#shoppingSum').html(sum);
			loadingBox.remove();
    		$('html, body').css("cursor", "auto");

		}).fail(function() { 
			alert("Error");
			$('html, body').css("cursor", "auto");
		});

	});

    $('.itemBlcok').click(function() {
    	alert("im in");
    	//alert("gs_objectId="+gs_objectId);
    });
	
	$('.itemBlock').hover(
		function () {
            $(this).find('article').animate({opacity:'1'}, 1000);
        },
        function () {
            $(this).find('article').animate({opacity:'0'});
        });
	
	// remove goods from shopping cart by goods id
	$('.removeCart').livequery('click', function() {
		var father = $(this).closest('.cartInfo');
		var goodsIdToRemove = father.find(".cartID").val();
		$('html, body').css("cursor", "wait");
		$.post("/protected/php/shopping.php?&jsAction=removeOrder", {id:goodsIdToRemove}, function(data)
    	{
			// to do 
    	}).done(function() { 
				var orderPrice = father.find('.getPrice').html() * 1;
				var orderQuantity = parseInt(father.find('.cartQuantity').html());
				father.slideUp("normal", function() { $(this).remove(); } );
				
				// remove goodsId from array
				goodsIDs.splice( goodsIDs.indexOf(goodsIdToRemove), 1 );
				
				var total = $('#priceSum').html() * 1;
				$('#priceSum').html((total - (orderPrice*orderQuantity).toFixed(2)).toFixed(2));
				var sum = parseInt($('#shoppingSum').html()) - orderQuantity;
				$('#shoppingSum').html(sum);
				$('html, body').css("cursor", "auto");
    	}).fail(function() { 
    			alert("Error when delete item.");
    			$('html, body').css("cursor", "auto");
    	}); 
		
	});	// end of removeCart

});
/*
function addTest(el, goodsId, goodsName, goodsPrice, goodsFormat) {
	// loading animation
	var parent = el.parent().parent();
	var loadingBox = new ajaxLoader(parent);
	var imgSrc = parent.find('a img')[0].src;

//	alert('id is '+goodsId+' and name is '+goodsName+' and price is '+goodsPrice+' and format is '+goodsFormat+' and img src is '+imgSrc);
	$.post("/protected/php/shopping.php?&jsAction=addGoods", 
		{ id:goodsId, name:goodsName, price:goodsPrice, format:goodsFormat, img:imgSrc }, function(data)
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
}  */

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