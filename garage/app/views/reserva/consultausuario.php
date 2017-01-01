  <div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    
    <tr>
      <th class="column-title">Sala</th>
      <th class="column-title">Fecha</th>
      <th class="column-title">Hora</th>
      <th class="column-title">Precio</th>
    </tr>

    <?php foreach($listaReservas as $reserva) { ?>
    <tr>
      <td><?php echo $reserva->nombreSala;?></td>
      <td><?php echo $reserva->fecha;?></td>
      <td><?php echo $reserva->hora;?></td>
      <td><?php echo $reserva->precio;?></td>
    </tr>
    <?php }?>
    
  </table>
  </div>