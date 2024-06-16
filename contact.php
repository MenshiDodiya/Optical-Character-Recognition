<?php include_once("include/header.php"); ?>

 <!-- inner banner -->
    <div class="inner_banner layer" id="home">
        <div class="container">
            <div class="agileinfo-inner">
                <h2 class="text-center text-white">
                    Contact Page
                </h2>
            </div>
        </div>
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->

<!-- contact -->
<section class="contact py-5">
	<div class="container py-sm-3">
		<h3 class="heading text-capitalize mb-lg-5 mb-4"> Contact Us - <span>Get In Touch</span> </h3>
		<div class="address row">
			<div class="col-md-4 address-grid">
				<div class="address-info">
					<div class="address-left text-center">
					<i class="far fa-envelope"></i>
					</div>
					<div class="address-right text-center">
						<h6 class="ad-info text-uppercase mb-2">Email</h6>
							<a href="mailto:example@email.com"> mail@example.com</a>
							<a href="mailto:example@email.com"> mail@example.com</a>
					
					</div>
				</div>
			</div>
			<div class="col-md-4 address-grid">
				<div class="address-info">
					<div class="address-left text-center">					
						<i class="fas fa-mobile-alt"></i>
					</div>
					<div class="address-right text-center">
						<h6 class="ad-info text-uppercase mb-2">Phone</h6>
						<p>8264988599</p>
						<p>7433054930</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 address-grid">
				<div class="address-info">
					<div class="address-left text-center">
						<div class="address-right text-center">
							<h2>OPTICAL CHARACTER RECOGNITION</h2>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<?php if(isset($_GET['msg']) && $_GET['msg']==1){ ?>
				<h4 style="color:green; padding-left:10px;">Your information saved. You will contact soon by admin.</h4>
			<?php } else if(isset($_GET['msg']) && $_GET['msg']==2){ ?>
				<h4 style="color:red; padding-left:10px;">Something went wrong. Please try again</h4>
			<?php } ?>
		</div>
		<div class="form row py-5">
			<div class="col-lg-6 contact-form">
				<form action="contactformcode.php" method="post">
					<div class="fields-grid">
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="firstname" required=""> 
							<label>Full Name</label>
							<span></span>
						</div> 
						<div class="styled-input">
							<input type="email" name="email" required="">
							<label>Email Address</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="tel" name="phone" required="">
							<label>Phone Number</label>
							<span></span>
						</div>
						<div class="styled-input mt-5">
							<textarea name="message"></textarea>
							<label class="text">Your Message</label>
							<span></span>
						</div>
					</div>
					<input type="submit" value="Submit" name="btnContactNow">
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
<!-- //contact -->
		
<?php include_once("include/footer.php"); ?>