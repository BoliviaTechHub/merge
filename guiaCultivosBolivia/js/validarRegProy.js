$(document).ready(function(){
 var crd=0;	
 $("#fRegProy").validate(); 
 $(".eli").click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    eliminar_proy(id);	 
 }) 
 function eliminar_proy(id){
        //if(confirm("Realmente desea eliminar este registro")){
        //    window.location="eliminar_proy.php?id="+id;
        //}
    $('#spanMessage').html('¿Está seguro(a) de eliminar el registro?');
    $("#dialogConfirm").dialog({
        resizable: false,
        height: 200,
        modal: true,
        title: 'Confirmacion de eliminación',
        buttons: {
            'Aceptar': function () { 
                window.location="eliminar_proy.php?id="+id;
            },
            'Cancelar': function () {
            $(this).dialog("close");
            }
        }
    });
  }
 $('.edi').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $.getJSON('get_proyecto.php?id='+id, function (data) {
    	if(data['exitoso']==1){
    	   var proy=data['datos'];
    	   $('#nomep').val(proy.nombre);
    	   $('#desep').val(proy.descripcion);
    	   $('#id').val(proy['id']);
    	   $('#FormEP').modal('show'); 
    	}
 	});
 });

 $('.mos').click(function(event){
    event.preventDefault();
    var id= $(this).data('id');
    $.getJSON('get_encargados.php?id='+id, function (data) {
    	if(data['exitoso']==1){
    	   var datos=data['datos'];
		   $('#tbodyEnc').empty();
		   for(var i=0;i<datos.length;i++){
		   	 enc=datos[i]
		   	 fila="<tr><th>"+enc.apellidos+" "+enc.nombre+
		   	 "</th><th>"+enc.correo+"</th></tr>";
		   	 $('#tbodyEnc').append(fila);
		   }
    	   $('#TabEnc').modal('show'); 
    	}
 	}); 
 });
 $('#ap').click(function(e){
 	e.preventDefault();
 	crd++;     
 	$("#appnd").append("<table><tr class='ac'><td><input class='email required form-control' placeholder='Correo encargado "+crd+"' title='Debe ser correo' name='c"+crd+"'></td>"+
 		"<td><input class='required form-control' placeholder='Nombre encargado "+crd+"' title='Campo requerido'></td></tr></table>"); 	
 })

});