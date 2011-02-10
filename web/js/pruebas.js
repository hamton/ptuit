  $(document).ready(function() {
        alert("okk");
        $("#inputUser").blur(function(){
        $.ajax({
          type: "POST",
          async: "true",
          dataType: "json",
          data: {"inputUser":$("#inputUser").value},
          url: "probandoAjax.php",
          success: function(){
            alert("ok");
          }
        });
  });

});
