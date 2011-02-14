
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
		function reply(data){
			var reply=jQuery.parseJSON(data);
      	if(reply.user!="OK")
				{//user name is not allowed
				}
        //else //user name is allowed		
	});

});
});


