<div class="row">

  <p>Salas de Ensayo</p>

  <?php foreach($listaSalas as $sala) {?>

    <div class="col-md-55">
      <div class="thumbnail">
        <a href="app.php?controller=reserva&action=index&idSala=<?php echo $sala->idSala;?>">
          <div class="image view view-first">
            <img style="width: 100%; display: block;" src="../public/images/sala/media.jpg" alt="image" />
            <div class="mask">
              <p>Hacer reservas</p>
              <div class="tools tools-bottom">
              </div>
            </div>
          </div>
          <div class="caption">
            <strong><?php echo $sala->nombre; ?></strong>
            <p><?php echo $sala->direccion; ?></p>
          </div>
        </a>                            
      </div>
    </div>

  <?php }?>
</div>
                  
