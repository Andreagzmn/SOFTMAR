$("document").ready(function(){

	$("#search").keyup(function(){
		var q = $("#search").val(); 
		$.post("../Model/buscador.php", {q:q}, function(result){
			$("#myDiv").html(result);
		});		
	});

});
