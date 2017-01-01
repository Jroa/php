            
          <?php if (Helper::usuarioEstablecido()){?>
            <div class="profile">
              <div class="profile_pic">
                <img src="../public/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo Helper::getNombreUsuario(); ?></h2>
              </div>
            </div>
          <?php } ?>