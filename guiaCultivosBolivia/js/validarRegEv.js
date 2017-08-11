$(document).ready(function(){
 $("#fini").datepicker();
 $("#ffin").datepicker();
 $("#fRegEv").validate({
   submitHandler: function(form) {
      var allowedFiles = [".jpg", ".jpeg", ".png", ".gif", ".bmp"];
      var fileUpload = $("#foto");
      var lblError=$('#dc');
      var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
      if(!regex.test(fileUpload.val().toLowerCase())){
        //lblError.html("Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.");
        $('#dc').empty();
        $('#dc').append('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error! </strong>'+"Por favor subir archivos con extension: <b>" + allowedFiles.join(', ') + "</b> solamente."+'</div>');
        }else{
            return true;
            form.submit();
        }
    }
 });
 $('.ed').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    //alert(id);
    $.getJSON('get_cultivo.php?id='+id, function (data) {
    	if(data['exitoso']==1){  
    	   var cultivo=data['datos'];
    	   $('#nomu').val(cultivo['nombre']);
    	   $('#textou').val(cultivo['cuerpo']);
    	   $('#idu').val(cultivo['id']);
    	   $('#FormCulAct').modal('show'); 
    	}
 	});
 });
 $('.eli').click(function(event){
 	event.preventDefault();
    var id= $(this).data('id');
    eliminar_ev(id);	 
 });

 $('.mos').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    //alert(id);
    $.getJSON('get_participantes_evento.php?id='+id, function (data) {
    	if(data['exitoso']==1){
    	   var datos=data['datos'];
		   $('#tbodyEvPar').empty();
		   for(var i=0;i<datos.length;i++){
		   	 evp=datos[i]
		   	 fila="<tr><th>"+evp.apellidos+" "+evp.nombre+
		   	 "</th><th>"+evp.correo+"</th><th>"+evp.observacion+
		   	 "</th><th>"+evp.monto_cancelado+"</th></th>";
		   	 $('#tbodyEvPar').append(fila);
		   }
    	   $('#TabEvP').modal('show'); 
    	}
 	}); 
 });

 $('.mas').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $.getJSON('get_cultivo.php?id='+id, function (data) {
        
        if(data['exitoso']==1){
             
           var datos=data['datos']; 
           //alert(".."+datos.foto.substring(15));
           $('#imgvm').attr('src',datos.foto);
           $('#nomvm').text(datos.nombre);
           $('#cuervm').text(datos.cuerpo); 
           $('#TabMasEv').modal('show'); 
        }
    }); 
 });

	function eliminar_ev(id){
		//if(confirm("Realmente desea eliminar este registro")){
		//	window.location="eliminar_event.php?id="+id;
		//}
    $('#spanMessage').html('¿Está seguro(a) de eliminar el registro?');
    $("#dialogConfirm").dialog({
        resizable: false,
        height: 200,
        modal: true,
        title: 'Confirmacion de eliminación',
        buttons: {
            'Aceptar': function () { 
                window.location="eliminar_cultivo.php?id="+id;
            },
                'Cancelar': function () {
                $(this).dialog("close");
            }
        }
    });

	}     
});
