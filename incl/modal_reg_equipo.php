<div class="modal fade" id="TabRegEq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="l">EQUIPO</h1><h1><a class="r btn btn-primary" id="ap" href="">AGREGAR PARTICIPANTE</a></h1>
        </div>
        <form action="reg_equipo_hack.php" method="post" id="fRegEqHack">
        <input type="hidden" name="cp" value="" id="cp">
        <input type="hidden" name="h" value="" id="h">
        <table class="table">
            <thead id="thead-tabla">
             <tr>
              <td><label for="nomeq">NOMBRE EQUIPO</label></td>
              <td><input type="text" name="nomeq" id="nomeq" class="required" title="Campo requerido"></td>
             </tr>
            </thead>
            <tbody id="tbodyRE">
            </tbody>
        </table>
        
        <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" value="REGISTRAR"/></p>
        
        </form>
      </div>
    </div>
   </div>