<div class="modal fade" id="FormEP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">EDITAR PROYECTO</h1>
        </div>
        <form enctype="multipart/form-data" id="fRegProy" action="edit_proy.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="nomep" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="nomep" name="nomep" placeholder="Nombre" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
             <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="desep" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="desep" name="desep" placeholder="Detalles" title="Campo requerido">
                    </textarea>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="col-sm-1"></div>
            </div>
            
             
           <p><input class="btn btn-lg btn-default center-block" type="submit" id="validar" value="EDITAR"/></p>
        </form>

       </div> 
     </div>
    </div>