
<!-- Content-->
<div class="table-responsive">
<table class="table table-striped jambo_table bulk_action">
  <tr>
    <th class="column-title">Nombre</th>
    <th class="column-title">Apellido</th>
  </tr>

  <?php foreach($listaPersonas as $persona) {?>
  <tr>
    <td><?php echo $persona->nombre;?></td>
    <td><?php echo $persona->apellido;?></td>
  </tr>
  <?php }?>
</table>
</div>
                
