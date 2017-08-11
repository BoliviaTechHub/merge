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
    $.getJSON('get_evento.php?id='+id, function (data) {
    	if(data['exitoso']==1){
    	   var evento=data['datos'];
    	   //alert(evento['costo']);
    	   $('#nomu').val(evento['nombre']);
    	   $('#cuposu').val(evento['cupos']);	  
    	   $('#finiu').val(evento['fecha_ini']);
    	   $('#ffinu').val(evento['fecha_fin']);
    	   $('#detu').val(evento['detalles']);
    	   $('#cosu').val(evento['costo']);
    	   $('#ubiu').val(evento['ubicacion']);
    	   $('#idu').val(evento['id']);
    	   $('#FormEvA').modal('show'); 
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
    $.getJSON('get_evento.php?id='+id, function (data) {
        
        if(data['exitoso']==1){
             
           var datos=data['datos']; 
           //alert(datos.foto.substring(40));
           $('#imgvm').attr('src',datos.foto.substring(40));
           $('#ubivm').text(datos.ubicacion);
           $('#diaivm').text(datos.diaini);
           $('#mesivm').text(datos.mesini);
           $('#nomvm').text(datos.nombre);
           $('#fechasvm').text("Del "+datos.diaini+" de "+datos.mesini+" a las "+datos.horaini+" al "+datos.diafin+" de "+datos.mesfin+" a las "+datos.horafin);
           $('#detvm').text(datos.detalles); 
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
                window.location="eliminar_event.php?id="+id;
            },
                'Cancelar': function () {
                $(this).dialog("close");
            }
        }
    });

	}     
});
