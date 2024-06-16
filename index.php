<?php include_once("include/header.php"); ?>

<!-- banner -->
<section class="banner layer" id="home">
	<div class="container">
		<div class="banner-text">
			<div class="slider-info mb-4">
				
				<div class="agileinfo-logo">
					<?php if(isset($_GET['errormsg']) && $_GET['errormsg']==1){ ?>
					<h4 class="text-center" style="color:red;">Your login Name or password is invalid</h4>
					<?php } ?>
					<h3>
						 Strength grows in the moments when you think
					</h3>
				</div>
				<h3 class="txt-w3_agile mb-3">you can't go on but you keep going anyway.</h3>
				<a href="about.php"><i class="fas fa-book"></i> Read More</a>
			</div>
			<!-- To bottom button-->
			<div class="thim-click-to-bottom">
				<div class="rotate">
					<a href="#welcome" class="scroll">
						<i class="fas fa-angle-double-down"></i>
					</a>
				</div>
			</div>
			<!-- //To bottom button-->

		</div>
	</div>
</section>
<!-- //banner -->

<!-- welcome -->
<section class="welcome py-5" id="welcome">
	<div class="container py-sm-3">
		<section class="welcome py-5" id="welcome">
	<div class="container py-sm-3">
		
		<h3 class="heading text-capitalize mb-lg-5 mb-4"><span>Few Words About Us</span> </h3>
		<div class="row welcome-grids">
			<div class="col-lg-6 mb-lg-0 mb-5">
				<h4>Optical Character Recognition</h4>
				<p class="mb-3">OCR software or an Online OCR service converts scans, document images taken with a digital camera or Smartphone, as well as PDF files to searchable and editable formats. All OCR systems include an optical scanner for reading text, and sophisticated software for analyzing images.</p>
				<p class="mb-3">Process of OCR</p>
				<p> <i class="fas mr-2 fa-hand-point-right"></i>Image</p>
				<p> <i class="fas mr-2 fa-hand-point-right"></i> Document Scanning</p>
				<p> <i class="fas mr-2 fa-hand-point-right"></i> Text Detection</p>
				<p> <i class="fas mr-2 fa-hand-point-right"></i> Character Segmentation</p>
				<p> <i class="fas mr-2 fa-hand-point-right"></i> Character Recognition</p>
				<div class="welcome-button mt-4">
					<a href="about.php">Read More</a>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="image1 mb-4">
				<!--<h4>Intresting</h4>
					<p class="mt-3">OCR analysis takes the input as digital image which is printed or handwritten and converts it to machine readable digital text format.
					OCR uses a devices that reads pencil marks and converts them into a computer usable form.OCR technology recognizes characters on a source document using the optical properties of the equipmentand media.</P>-->
					<span class="fa fa-cog" aria-hidden="true"></span>
				</div>
				<div class="image1 pt-0">
				<!--<h4>Function</h4>
					<p class="mt-3">OCR software works with your scanner to convert printed characters into digital text allowing yoiu to search for or edit your document in a word processing program.</P>-->
					<span class="fas fa-graduation-cap"></span>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- welcome -->

<!-- welcome bottom -->
<section class="welcome-bottom">
	<div class="image-layer py-5">
		<div class="container py-sm-3">
		<h3 class="heading text-capitalize mb-lg-5 mb-4"> Main Features And Benifits</span> </h3>
		<div class="row bottom-grids">
			<div class="row col-lg-4 mb-lg-0 mb-5">
				<div class="col-lg-3 col-2">
						<i class="fas fa-book"></i>
				</div>
				<div class="col-lg-9 col-10">
					<h4>Document Recognition</h4>
					<p>Scanned document recognition:-It recognizes the characters fr om the scanned document image and makes the document editable and searchable.</p>
				</div>
			</div>
			<div class="row col-lg-4 mb-lg-0 mb-5">
				<div class="col-lg-3 col-2">
					<i class="fas fa-book"></i>
				</div>
				<div class="col-lg-9 col-10">
					<h4>Document Recognition</h4>
					<p>Digital camera images recognition:-It recognizes the charater from the document image and makes that document as editable and searchable.</p>
				</div>
			</div>
			<div class="row col-lg-4">
				<div class="col-lg-3 col-2">
					<i class="fab fa-firstdraft"></i>
				</div>
				<div class="col-lg-9 col-10">
					<h4>System training</h4>
					<p>Here training is given to user like audio clip, video clip, personal for any one user, text means one-by-one steps is given to guide an user.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //welcome bottom -->

<!-- services -->
<section class="services py-5">
	<div class="container py-sm-3">
		<h3 class="heading text-capitalize mb-lg-5 mb-4"> Services - <span>What We Offer</span> </h3>
		<div class="row service-grids">
			<div class="col-lg-4 col-md-6">
				<div class="service-grid1">
					<i class="fas fa-tasks"></i>
					<h5>1</h5>
					<h4 class="mb-3">System training</h4>
					<p>Step by step training of entire flow to end user.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mt-md-0 mt-5">
				<div class="service-grid1">
					<i class="fas fa-globe"></i>
					<h5>2</h5>
					<h4 class="mb-3">Doc. recognition</h4>
					<p>Written text, Typed text, Snap shot</p>				
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
				<div class="service-grid1">
					<i class="fab fa-digital-ocean"></i>
					<h5>3</h5>
					<h4 class="mb-3">Unlimited upload</h4>
					<p>Unlimited uploading of images, document.</p>
				</div>
			</div>
			<div class="ser-button mt-4">
				<a href="services.php">Explore all services</a>
			</div>
		</div>
	</div>
</section>
<!-- //services -->

<?php include_once("include/footer.php"); ?>