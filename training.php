<?php 
	include_once("include/header.php"); 
	if(isset($_SESSION['login_user'])){
?>

 <!-- inner banner -->
    <div class="inner_banner layer" id="home">
        <div class="container">
            <div class="agileinfo-inner">
                <h2 class="text-center text-white">
                    Request Training
                </h2>
            </div>
        </div>
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Request Training</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->

	
<!-- services -->
<section class="services py-5">
	<div class="container py-sm-3">
	<div class="row">
        <?php if(isset($_GET['msg']) && $_GET['msg']==1){ ?>
            <h4 style="color:green; padding-left:10px;">Your Training Request is submitted</h4>
        <?php } else if(isset($_GET['msg']) && $_GET['msg']==2){ ?>
            <h4 style="color:red; padding-left:10px;">Something went wrong. Please try again</h4>
        <?php }  else if(isset($_GET['msg']) && $_GET['msg']==3){ ?>
            <h4 style="color:red; padding-left:10px;">Unauthorised Access</h4>
        <?php } else if(isset($_GET['msg']) && $_GET['msg']==4){ ?>
            <h4 style="color:green; padding-left:10px;">Record update</h4>
        <?php } else if(isset($_GET['msg']) && $_GET['msg']==5){ ?>
            <h4 style="color:green; padding-left:10px;">Record deleted</h4>
        <?php } else if(isset($_GET['msg']) && $_GET['msg']==6){ ?>
            <h5 style="color:red; padding-left:10px;">Document type not allowed. Contact Admin.</h5>
        <?php } else if(isset($_GET['msg']) && $_GET['msg']==7){ ?>
            <h5 style="color:red; padding-left:10px;">You already requested for the training</h5>
        <?php } ?>
        </div>
		
		<div class="form row py-5">
			<div class="col-lg-6 contact-form">
				<form action="trainingcode.php" method="post">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Training Type</label>
						<select name="t_m_id" class="form-control" required="">
							<option value="">Select Training Type</option>
							<?php
							$selTraining = "SELECT * FROM training_master ORDER BY t_type ASC";
							$rsTraining = mysqli_query($conn, $selTraining);
							$countTraining = mysqli_num_rows($rsTraining);
							if(!empty($countTraining)){
								while($row = mysqli_fetch_array($rsTraining)){
									$t_m_id = $row['t_m_id'];
									$t_type = $row['t_type'];
							?>
								<option value="<?php echo $t_m_id; ?>"><?php echo $t_type; ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				<input type="submit" value="Submit" name="btnTraining">
				</form>
			</div>
			<div class="col-lg-6 mt-lg-0 mt-5">
				<div class="bg-img">
					<div class="contact-layer">
						<h3 class="mb-3">Dont hesitate to contact us for any kind of information</h3>
						<!--<p><i class="fas mr-2 fa-phone"></i> 8264988599 </p>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //services -->
	<?php } else {
	header('location:index.php');
	exit;
}
?>