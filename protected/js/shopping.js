$(function(){
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
