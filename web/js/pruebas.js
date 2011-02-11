$(document).ready(function(){
  
      $("#inputUser").blur(function(){
      $("#ajax").load("probandoAjax.php", {nombre: "Pepe", edad: 45}, function(){
					
         alert("recibidos los datos por ajax");
      });
  });
});


