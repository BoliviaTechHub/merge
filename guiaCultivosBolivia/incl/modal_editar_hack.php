<div class="modal fade" id="FormHackA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">EDITAR HACKATON</h1>
        </div>
        <form enctype="multipart/form-data" id="fEdHack" action="editar_hackathon.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="nomA" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="nomA" name="nomA" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="ubiA" class="col-sm-2 col-form-label">Ubicación</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="ubiA" name="ubiA" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="detA" class="col-sm-2 col-form-label">Detalles</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="detA" name="detA" placeholder="Detalles" title="Campo requerido">
                    </textarea>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="finiA" class="col-sm-2 col-form-label">Inicio</label>
                <div class="col-sm-4">
                    <input type="text" class="required form-control" id="finiA" name="finiA" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="ffinA" class="col-sm-2 col-form-label">Fin</label>
                <div class="col-sm-4">
                    <input type="text" class="required form-control" id="ffinA" name="ffinA" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div> 
            <input type="hidden" name="idA" id="idA">
           <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="ACTUALIZAR"/></p>
        </form>
      </div>
    </div>
   </div>