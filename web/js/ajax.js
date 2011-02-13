
/*
$(document).ready(function(){
      $("#inputUser").blur(function(){
			var inputUser=$("#inputUser").val();
      $("#ajax").load("validateUser.php", {user: inputUser}, function(data){
         
				 alert(+ data.respuesta);
      });
  });
});




$(document).ready(function(){
	$("#inputUser").blur(function(){
	var inputUser=$("#inputUser").val();
	var dataString='user='+ inputUser; 
	$.ajax({
    data: dataString,
	  dataType:'json',
    type: "POST",
		
    url: "validateUser.php",
    success: function(data){
			var resultado= jQuery.parseJSON('{"name" : "Jhon"}');
       alert(resultado.name);
			 alert(+data.respuesta);
     }
   });
	
		
	 });
});

*/

$(document).ready(function(){
	$("#inputUser").blur(function(){
	var inputUser=$("#inputUser").val();
	$.post(
		"validateUser.php",
		{user:inputUser},
		function respuesta(data){
			var resultado=jQuery.parseJSON(data);
			alert(resultado.respuesta);

		}
	);


});
});

