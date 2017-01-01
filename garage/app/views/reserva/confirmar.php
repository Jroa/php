
<section class="content invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12 invoice-header">
      <h1>
                      <i class="fa fa-globe"></i> Pedido.
                      <small class="pull-right">Fecha: <?php echo $fechaPedido; ?></small>
                  </h1>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      De
      <address>
                      <strong>Garage Space</strong>
                      <br>Av. Siempre Viva 123
                      <br>Springfield
                      <br>Telefono: 12345678
                      <br>Email: hola@garagespace.com
                  </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      Para
      <address>
                      <strong><?php echo $usuario->nombre; ?></strong>
                      <br>Email: <?php echo $usuario->email; ?>

                  </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b></b>
      <br>
      <br>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Sala</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>

        <?php foreach($itemReservados as $item){?>

          <tr>
            <td><?php echo $sala->nombre ?></td>
            <td>1</td>
            <td><?php echo $item->fecha ?></td>
            <td><?php echo $item->hora ?></td>
            <td>S/.<?php echo $item->precio ?></td>
          </tr>

        <?php }?>

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <p class="lead">Formas de Pago:</p>
      <img src="../public/images/visa.png" alt="Visa">
      <img src="../public/images/mastercard.png" alt="Mastercard">
      <img src="../public/images/american-express.png" alt="American Express">
      <img src="../public/images/paypal.png" alt="Paypal">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        Debe abonar el 50% del total de la hora, el 50% restante lo cancelará en la sala el mismo dia en que se realiza el ensayo.
Por favor confirmar su depósito vía email a reservas@garagespace.com para la confirmación..
      </p>
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
      <p class="lead">Importes</p>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>S/. <?php echo $reservaImporte->subTotal; ?></td>
            </tr>
            <tr>
              <th>Igv (18%)</th>
              <td>S/. <?php echo $reservaImporte->igv; ?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>S/. <?php echo $reservaImporte->total; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
      <button class="btn btn-success pull-right" onclick="grabar()"><i class="fa fa-credit-card"></i> Confirmar Reserva</button>
      <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generar PDF</button>-->
    </div>
  </div>
</section>

<form id="frmGrabar" action="app.php" method="post">
  <input type="hidden" name="controller" value="reserva">
  <input type="hidden" name="action" value="create">  
</form>

<script type="text/javascript">
  
  function grabar(){
    document.getElementById("frmGrabar").submit();
  }
</script>