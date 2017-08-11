$(document).ready(function(){
 var ce=0;
 var hack=0;
 $("#fini").datepicker();
 $("#ffin").datepicker();
 $("#fRegHack").validate({
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
 $("#fEdHack").validate();
 $("#fActRes").validate();
 $("#fRegEqHack").validate();
 
$("#tbodyRE").empty();
$('.ed').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $.getJSON('get_hackaton.php?id='+id, function (data) {
    	if(data['exitoso']==1){
    	   var evento=data['datos'];
    	   //alert(evento['costo']);
    	   $('#nomA').val(evento['nombre']);
    	   $('#ubiA').val(evento['ubicacion']);
    	   $('#detA').val(evento['detalles']);
    	   $('#finiA').val(evento['fecha_ini']);
    	   $('#ffinA').val(evento['fecha_fin']);
    	   $('#idA').val(evento['id']);
    	   $('#FormHackA').modal('show'); 
    	}
 	});
 });
 $('.eli').click(function(event){
 	  event.preventDefault();
    var id= $(this).data('id');
    eliminar_hack(id);	 
 });
 $('.mos').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    //alert(id);
    $.getJSON('get_equipos.php?id='+id, function (data) {
    	if(data['exitoso']==1){
    	   var datos=data['datos'];
		   $('#tbodyEqHack').empty();
		   for(var i=0;i<datos.length;i++){
		   	 evp=datos[i]
		   	 fila="<tr><th>"+evp.nombre+" "+evp.apellidos+
		   	 "</th><th>"+evp.correo+"</th><th>"+evp.equipo+
		   	 "</th><th>"+evp.resultados+"</th></th>";
		   	 $('#tbodyEqHack').append(fila);
		   }
    	   $('#TabEvHack').modal('show'); 
    	}
 	});	 
 });
 $('.cal').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $.getJSON('get_equipos_hackaton.php?id='+id, function (data) {
    	if(data['exitoso']==1){
    	   var datos=data['datos'];
		   $('#tbodyCalEq').empty();
		   $('#cEq').val(datos.length);
		   $('#hack').val(id);
		   for(var i=0;i<datos.length;i++){
		   	 eq=datos[i];
		   	 fila="<tr><th>"+eq.nombre+
		   	 "</th><th><input type='text' class='required' name='r"+eq.id+"' value='"+eq.resultados+"' title='Este campo es obligatorio'>";
		   	 $('#tbodyCalEq').append(fila);
		   }
    	   $('#TabCalEq').modal('show'); 
    	}
 	});
 	 
 });
 $('.vm').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $.getJSON('get_hackaton.php?id='+id, function (data) {
        //alert(id);
        //alert(data['exitoso']);
        if(data['exitoso']==1){
           var datos=data['datos']; 
           $('#imgvm').attr('src',".."+datos.foto.substring(15));
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
  $('.re').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $('#h').val(id);
    hack=id;
  });
  $('#ap').click(function(event){
    event.preventDefault();
    ce++;
    var c1="<tr><td><input data-id='"+ce+"' type='text' name='c"+ce+"' placeholder='Correo participante"+ce+"' class='email required auto em' title='Debe ser correo' autocomplete='off'></td>";
    var c2="<td><input type='text' placeholder='Nombre participante "+ce+"' class='required' title='Campo requerido' autocomplete='off'></td>"
    var c3="<td><div id='err"+ce+"''></div></td></tr>";
    $('#cp').val(ce);
    $('#h').val(hack);
    $("#tbodyRE").append(c1+c2+c3);
  });
  
  function eliminar_hack(id){
        //if(confirm("Realmente desea eliminar este registro")){
        //    window.location="eliminar_hack.php?id="+id;
        //}
    $('#spanMessage').html('¿Está seguro(a) de eliminar el registro?');
    $("#dialogConfirm").dialog({
        resizable: false,
        height: 200,
        modal: true,
        title: 'Confirmacion de eliminación',
        buttons: {
            'Aceptar': function () { 
                window.location="eliminar_hack.php?id="+id;
            },
                'Cancelar': function () {
                $(this).dialog("close");
            }
        }
    });
  } 
});
   
