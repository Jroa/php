<!-- Content-->
<form id="frmConfirmarCompra" name="frmConfirmarCompra" action="app.php" method="post">
  <input type="hidden" name="controller" value="reserva">
  <input type="hidden" name="action" value="confirmarCompra">
</form>
<table>
  <tr>
    <td><h3><?php echo $sala->nombre; ?></h3></td>
    <td><button type="submit" class="btn btn-success" onclick="reservar()">Reservar</button></td>
    <td><button type="submit" class="btn btn-primary">Cancelar</button></td>
  </tr>
</table>

<div class="table-responsive">
<table class="table table-striped jambo_table bulk_action">
  <tr>
    <th class="column-title">Hora</th>
    <th class="text-center">
      <?php echo $semana->getNombreDia($semana->dia01DeSemana); ?><br/>
      <?php echo $semana->dia01; ?>
    </th>
    <th class="text-center">
      <?php echo $semana->getNombreDia($semana->dia02DeSemana); ?><br/>
      <?php echo $semana->dia02; ?>
    </th>
    <th class="text-center">
      <?php echo $semana->getNombreDia($semana->dia03DeSemana); ?><br/>
      <?php echo $semana->dia03; ?>
    </th>
    <th class="text-center">
      <?php echo $semana->getNombreDia($semana->dia04DeSemana); ?><br/>
      <?php echo $semana->dia04; ?>
    </th>
    <th class="text-center">
      <?php echo $semana->getNombreDia($semana->dia05DeSemana); ?><br/>
      <?php echo $semana->dia05; ?>
    </th>
    <th class="text-center">
      <?php echo $semana->getNombreDia($semana->dia06DeSemana); ?><br/>
      <?php echo $semana->dia06; ?>
    </th>
    <th class="text-center">
      <?php echo $semana->getNombreDia($semana->dia07DeSemana); ?><br/>
      <?php echo $semana->dia07; ?>
    </th>
  </tr>



  <?php foreach($listaDisponibilidad as $item) { ?>
  <tr>
    <td><?php echo $item->hora;?></td>
    <td align="center">
      <button type="button" 
      class="<?php echo Helper::getEstilo($item->estado01);?>"
      data-precio="<?php echo $item->dia01;?>" 
      id="<?php echo $item->getIdFecha01(); ?>" 
      onclick="seleccionar('<?php echo $item->getIdFecha01(); ?>')">
      <?php echo $item->dia01;?>
      </button>
    </td>
    <td align="center">
      <button type="button"
      class="<?php echo Helper::getEstilo($item->estado02);?>" 
      data-precio="<?php echo $item->dia02;?>" 
      id="<?php echo $item->getIdFecha02();  ?>"  
      onclick="seleccionar('<?php echo $item->getIdFecha02();  ?>')">
      <?php echo $item->dia02;?>
      </button>
    </td>
    <td align="center">
      <button type="button"
      class="<?php echo Helper::getEstilo($item->estado03);?>" 
      data-precio="<?php echo $item->dia03;?>" 
      id="<?php echo $item->getIdFecha03();  ?>" 
      onclick="seleccionar('<?php echo $item->getIdFecha03();  ?>')">
      <?php echo $item->dia03;?>
      </button>
    </td>
    <td align="center">
      <button type="button"
      class="<?php echo Helper::getEstilo($item->estado04);?>" 
      data-precio="<?php echo $item->dia04;?>" 
      id="<?php echo $item->getIdFecha04();  ?>" 
      onclick="seleccionar('<?php echo $item->getIdFecha04();  ?>')">
      <?php echo $item->dia04;?>
      </button>
    </td>
    <td align="center"> 
      <button type="button" 
      class="<?php echo Helper::getEstilo($item->estado05);?>" 
      data-precio="<?php echo $item->dia05;?>" 
      id="<?php echo $item->getIdFecha05();  ?>" 
      onclick="seleccionar('<?php echo $item->getIdFecha05();  ?>')">
      <?php echo $item->dia05;?>
      </button>
    </td>
    <td align="center">
      <button type="button"
      class="<?php echo Helper::getEstilo($item->estado06);?>" 
      data-precio="<?php echo $item->dia06;?>" 
      id="<?php echo $item->getIdFecha06();  ?>" 
      onclick="seleccionar('<?php echo $item->getIdFecha06();  ?>')">
      <?php echo $item->dia06;?>
      </button>
    </td>
    <td align="center">
      <button type="button"
      class="<?php echo Helper::getEstilo($item->estado07);?>" 
      data-precio="<?php echo $item->dia07;?>" 
      id="<?php echo $item->getIdFecha07();  ?>" 
      onclick="seleccionar('<?php echo $item->getIdFecha07();  ?>')">
      <?php echo $item->dia07;?>
      </button>
    </td>
  </tr>
  <?php }?>
</table>
</div>

<script type="text/javascript">
  function seleccionar(id){

    
    var idBoton = "#" + id;
    var SELECCIONADO = "btn btn-warning";
    var RESERVADO = "btn btn-danger";
    var DISPONIBLE = "btn btn-info";

    var fecha = id.substr(2,10);
    var hora = id.substr(14,2) + ":00";
    var precio = $(idBoton).data("precio");

    var estado = $(idBoton).attr("class");

    if (estado == DISPONIBLE){
      $(idBoton).attr("class",SELECCIONADO);
      
      addItem(fecha,hora,precio);

    }else if (estado == SELECCIONADO){
      $(idBoton).attr("class",DISPONIBLE);

      deleteItem(fecha,hora);
    }
    
  }

  function addItem(pFecha,pHora, pPrecio){
    $.ajax({
      url : "app.php",
      data: { controller: "reserva", action: "addItem", fecha: pFecha, hora: pHora, precio: pPrecio},
      type: "POST",
      dataType: "json",
      success: function(json){
        //alert(json.resultado);
      }
    });
    
  }

  function deleteItem(pFecha,pHora){
      $.ajax({
        url : "app.php",
        data: { controller: "reserva", action: "deleteItem", fecha: pFecha, hora: pHora},
        type: "POST",
        dataType: "json",
        success: function(json){
          //alert(json.resultado);
        }
      });
  }

  function reservar(){
    if (getCantidadItemsSeleccionados() > 0){
      redireccionarAConfirmarCompra();
    }else{
      alert("Debe seleccionar al menos una hora");
    }
  }

  function redireccionarAConfirmarCompra(){
    //location.href = "app.php?controller=reserva&action=confirmarCompra";
    document.getElementById("frmConfirmarCompra").submit();
  }

  function getCantidadItemsSeleccionados(){
    var cantidad;
    $.ajax({
      url : "app.php",
      async: false,
      data: { controller: "reserva", action: "getTotalItems"},
      type: "POST",
      dataType: "json",
      success: function(json){
        //alert(json.resultado + " " + json.cantidad);
        if (json.resultado == "ok"){
          cantidad = json.cantidad;
        }else{
          cantidad = -1;
        }
      }
    });
    return cantidad;    
  }
</script>
