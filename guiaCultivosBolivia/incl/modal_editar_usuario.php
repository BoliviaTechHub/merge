<div class="modal fade" id="FEdUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">EDITAR PARTICIPANTE</h1>
        </div>
        <form id="fReg" action="editar_user.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="nome" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="nome" name="nome" placeholder="Nombre" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="apee" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="apee" name="apee" placeholder="Apellidos" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <input type="hidden" id="core" name="core">
            
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="cele" class="col-sm-2 col-form-label">Celular</label>
                <div class="col-sm-8">
                    <input type="number" class="number form-control" id="cele" name="cele" autocomplete="new-password" class="number"
                    title="Debes introducir un número">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="EDITAR"/></p>
        </form>

       </div> 
     </div>
    </div>