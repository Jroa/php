<form id="demo-form2" 
  data-parsley-validate class="form-horizontal form-label-left"
  action="app.php"
  method="post">

  <input type="hidden" name="controller" value="usuario">
  <input type="hidden" name="action" value="createPost">

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" name="telefono" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" name="email" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>    

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" name="password" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div> 

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirmar Password <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" name="confirmarPassword"required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>   

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" class="btn btn-success">Enviar</button>
      <button type="submit" class="btn btn-primary">Cancelar</button>
    </div>
  </div>

</form>
