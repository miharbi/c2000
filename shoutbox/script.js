$(function(e){ 

	$( "#_submit" ).click(function( ) {
	
		 $('#response').html('Enviando mensaje...<img src="shoutbox/load.gif" />');
		 
		 
		 var _message = $('#_message').val();
		 var _name = $('#_name').val();

		 $.ajax({
		 	type: "GET",
		 	url: "shoutbox/sendshout.php",
		 	
  			data: { message: _message, name: _name },
		       success: function (data) {
			$( "#response" ).html( data );
			$('#_message').val('Introduzca Mensaje');
		 	$('#_name').val('Nombre');
		 	refresh_shout ( );
               
                } });
			
		 
		 
		 
		 
	
	});
	
	$( "#reload" ).click(function() { refresh_shout();});
	
	
	refresh_shout();

});

function refresh_shout() {
	
		$.ajax({url: "shoutbox/returnshouts.php",
			success: function (data) {
			$( "#chatboxMensajes" ).html( data );
               
                },
                fail:function() {
		    alert( "error" );
		  }
		                
                });
		

  		window.setTimeout ("refresh_shout()", 60000);

}