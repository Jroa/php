<!-- Content-->
<div class="">
  <form id="frmTarifa" name="frmTarifa" action="">

  <table>
    <tr>
      <td>
      <button type="button" class="btn btn-success" onclick="enviar()">Grabar</button>
      </td>
      <td><button type="button" class="btn btn-danger">Cancelar</button></td>
      <td>
          <div id="mensajeEspera" class="title_left">
            <h4>Grabando...</h4>
          </div>
      </td>
      <td><div id="imagenEspera"><img src="../public/images/espera.gif" width="40" /></div></td>
    </tr>
  </table>
  
  <div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    
    <tr>
      <th class="column-title">HORA</th>
      <th class="column-title">LUN</th>
      <th class="column-title">MAR</th>
      <th class="column-title">MIE</th>
      <th class="column-title">JUE</th>
      <th class="column-title">VIE</th>
      <th class="column-title">SAB</th>
      <th class="column-title">DOM</th>
    </tr>

    <?php foreach($listaTarifas as $item) { ?>
    <tr>
      <td><?php echo $item->hora;?></td>
      <td>
        <input type="text" size ="1" 
        name = "<?php echo "id_". substr($item->hora,0,2) . "d_lun"; ?>"
        id = "<?php echo "id_". substr($item->hora,0,2) . "d_lun"; ?>"
          class="form-control input-sm" value=<?php echo $item->lunes;?>>
      </td>
      <td>
        <input type="text" size="1" 
        name = "<?php echo "id_". substr($item->hora,0,2) . "h_mar"; ?>"
        id = "<?php echo "id_". substr($item->hora,0,2) . "h_mar"; ?>"        
          class="form-control input-sm" value=<?php echo $item->martes;?>>
      </td>
      <td>
        <input type="text" size="1" 
        name = "<?php echo "id_". substr($item->hora,0,2) . "h_mie"; ?>"
        id = "<?php echo "id_". substr($item->hora,0,2) . "h_mie"; ?>"

          class="form-control input-sm" value=<?php echo $item->miercoles;?>>
      </td>
      <td>
        <input type="text" size="1" 
        name = "<?php echo "id_". substr($item->hora,0,2) . "h_jue"; ?>"
        id = "<?php echo "id_". substr($item->hora,0,2) . "h_jue"; ?>"
          class="form-control input-sm" value=<?php echo $item->jueves;?>>
      </td>
      <td>
        <input type="text" size="1" 
        name = "<?php echo "id_". substr($item->hora,0,2) . "h_vie"; ?>"
        id = "<?php echo "id_". substr($item->hora,0,2) . "h_vie"; ?>"        
          class="form-control input-sm" value=<?php echo $item->viernes;?>>
      </td>
      <td>
        <input type="text" size="1" 
        name = "<?php echo "id_". substr($item->hora,0,2) . "h_sab"; ?>"
        id = "<?php echo "id_". substr($item->hora,0,2) . "h_sab"; ?>"        
          class="form-control input-sm" value=<?php echo $item->sabado;?>>
      </td>
      <td>
        <input type="text" size="1" 
        name = "<?php echo "id_". substr($item->hora,0,2) . "h_dom"; ?>"
        id = "<?php echo "id_". substr($item->hora,0,2) . "h_dom"; ?>"        
          class="form-control input-sm" value=<?php echo $item->domingo;?>>
      </td>
    </tr>
    <?php }?>
    
  </table>
  </div>
  </form>  
</div>
<script type="text/javascript">

  $( document ).ready(function() {
      $('#mensajeEspera').hide();
      $('#imagenEspera').hide();
  });

  function enviar(){
    if(validacionOK()){
      grabar();
    };
  }

  function validacionOK(){
    //$.isNumeric(10);

    var campos = new Array();
    var indice = 0;

    $("#frmTarifa").find(':input').each(function() {
     var elemento= this;
     
     //alert("elemento.id="+ elemento.id + ", elemento.value=" + elemento.value); 
     if (elemento.id.substr(0,2)=="id"){
        //alert($("#"+ elemento.id).val() + " " + elemento.id);
        campos[indice] = elemento.id;
        indice++;
     }
    });
    
    var dias = new Array();
    dias['lun'] = "Lunes";
    dias['mar'] = "Martes";
    dias['mie'] = "Miercoles";
    dias['jue'] = "Jueves";
    dias['vie'] = "Viernes";
    dias['sab'] = "Sabado";
    dias['dom'] = "Domingo";

    var campo = "";
    var keyDia="";
    var hora="";
    for(var i = 0; i < campos.length; i++){
      campo = "#" + campos[i];
      if(!$.isNumeric($(campo).val())){
        keyDia = campo.substr(8,3);
        hora = campo.substr(4,2) + ":00";
        alert("El dia " + dias[keyDia] + " " + hora + " debe ser numerico");
        $(campo).focus();
        return false;
      }
    }

    return true;
  }

  function grabar(){

      $.ajax({
        url : "app.php",
        data: $("#frmTarifa").serialize() + "&controller=tarifa&action=update",
        type: "POST",
        dataType: "json",
        success: function(response){
          alert(response.mensaje );
        },
        beforeSend: function( xhr ) {
          $('#mensajeEspera').show();
          $('#imagenEspera').show();          
        },
        complete: function(){
          $('#mensajeEspera').hide();
          $('#imagenEspera').hide();
        }
      });
      
  }
</script>

