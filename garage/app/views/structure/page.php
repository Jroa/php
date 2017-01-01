<?php include("helper.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("header.php");?>
    <!-- jQuery -->
    <script src="../public/js/jquery.min.js"></script>
  </head>
  
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Garage Space</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php include("menuprofile.php");?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include("sidebarmenu.php");?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php include("menufooterbuttons.php");?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include("topnavigation.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <!-- Content-->
                      <?php include($pageContent); ?>
                      <!-- /Content-->   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include("footercontent.php");?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- cargar los demas scripts-->
    <?php include("scriptsjs.php"); ?>
    <!-- /cargar los demas scripts-->
  </body>
</html>
