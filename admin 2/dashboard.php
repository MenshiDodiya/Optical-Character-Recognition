<?php require_once("include/header.php"); ?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <?php
        $selTotalFile = "SELECT * FROM user_document";
        $rsTotalFile = mysqli_query($conn, $selTotalFile);
        $countTotalFile = mysqli_num_rows($rsTotalFile);

        $selTotalConverted = "SELECT * FROM user_document WHERE ocr_response != ''";
        $rsSelTotalConverted = mysqli_query($conn, $selTotalConverted);
        $countTotalConverted = mysqli_num_rows($rsSelTotalConverted);

        $selTotalUser = "SELECT * FROM user";
        $rsSelTotalUser = mysqli_query($conn, $selTotalUser);
        $countTotalUser = mysqli_num_rows($rsSelTotalUser);
        ?>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $countTotalFile; ?></h3>
                  <p>Total Files</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <span class="small-box-footer"></span>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $countTotalConverted; ?></h3>
                  <p>Total Converted</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <span class="small-box-footer"></span>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $countTotalUser; ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <span class="small-box-footer"></span>
              </div>
            </div><!-- ./col -->
            
          </div><!-- /.row -->
          <!-- Main row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <?php include("include/footer.php");?>

  </body>
</html>