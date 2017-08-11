$(document).ready(function(){
  $("#fReg").validate({
  	submitHandler: function(form) {
      $.getJSON('verifica_correo.php?correo='+$("#cor").val(), function (data) {
    	//alert(data['regs']);
    	if(data['regs']==1){
    		//$("#cor").title="Correo ya registrado";
    		//alert("Correo ya registrado intente otro");
        $('#dc').append('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Correo ya registrado, intente otro.</div>');
    	}else{
    		form.submit();
    	}
  	  });
       
    }
  });

  $("#fLog").validate({
    submitHandler: function(form) {
      $.getJSON('verifica_usuario.php?correo='+$("#cor_log").val()+"&contra="+$("#con_log").val(), function (data) {
      //alert(data['regs']);
      if(data['exitoso']==1){
        //$("#cor").title="Correo ya registrado";
        window.location = "index.php";
      }else{
        $('#fLog div.form-group').addClass('has-error');
        $('#fLog div.form-group label').addClass('er');
        //alert("Correo y/o contraseña error");
        $("#er").append('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Correo y/o contraseña.</div>')
      }
      });
    }
  }); 
  $('.ed').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $.getJSON('get_usuario.php?id='+id, function (data) {
      if(data['exitoso']==1){
         var us=data['datos'];
         //alert(evento['costo']);
         $('#nome').val(us.nombre);
         $('#apee').val(us.apellidos);   
         $('#cele').val(us.celular);
         $('#core').val(us.correo);
         $('#FEdUs').modal('show'); 
      }
  });
 });
 $('.eli').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    eliminar_u(id);   
 });
  function eliminar_u(id){
    //if(confirm("Realmente desea eliminar este registro")){
    //  window.location="eliminar_us.php?id="+id;
    //}
    $('#spanMessage').html('¿Está seguro(a) de eliminar el registro?');
    $("#dialogConfirm").dialog({
        resizable: false,
        height: 200,
        modal: true,
        title: 'Confirmacion de eliminación',
        buttons: {
            'Aceptar': function () { 
                window.location="eliminar_us.php?id="+id;
            },
            'Cancelar': function () {
            $(this).dialog("close");
            }
        }
    });
  }   
});
