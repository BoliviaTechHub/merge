<div class="modal fade" id="TabCalEq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">CALIFICAR EQUIPOS</h1>
        </div>
        <form action="actualizar_resultados_hack.php" method="post" id="fActRes">
          <table class="table">
            <thead id="thead-tabla">
             <tr>
              <td>EQUIPO</td>
              <td>DETALLES</td>
             </tr>
            </thead>
            <tbody id="tbodyCalEq">
            </tbody>
            <input type="hidden" name="cEq" id="cEq">
            <input type="hidden" name="hack" id="hack">
          </table>
          <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" value="CALIFICAR"/></p>
        </form>
      </div>
    </div>
   </div>