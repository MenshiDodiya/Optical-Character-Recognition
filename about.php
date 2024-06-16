<?php include_once("include/header.php"); ?>

 <!-- inner banner -->
    <div class="inner_banner layer" id="home">
        <div class="container">
            <div class="agileinfo-inner">
                <h2 class="text-center text-white">
                    About Page
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
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->


<!-- welcome -->

<section class="welcome py-5" id="welcome">
	<div class="container py-sm-3">
		<?php 
		if(isset($_GET['msg']) && $_GET['msg']==1){ ?>
			<h4 class="text-center" style="color:red;">Old password does not match. Please try again.</h4>
		<?php 
		}else if(isset($_GET['msg']) && $_GET['msg']==2){ ?>
			<h4 class="text-center" style="color:green;">Your profile is updated.</h4>
		<?php	
		}else if(isset($_GET['msg']) && ($_GET['msg']==3 || $_GET['msg']==4)){ ?>
			<h4 class="text-center" style="color:red;">Something went wrong. Please try again.</h4>
		<?php	
		}else { }

		if(isset($_SESSION['login_user'])){
			$welcomeUser = $_SESSION['login_user']['u_name'];
		}else{
			$welcomeUser = '';
		}
		?>
		<h3 class="heading text-capitalize mb-lg-5 mb-4"> Welcome - <?php echo $welcomeUser; ?><span> Few Words About Us</span> </h3>
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
					<!--<a href="about.php">Read More</a>-->
				</div>
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="image1 mb-4">
				<h4>Intresting</h4>
					<p class="mt-3">OCR analysis takes the input as digital image which is printed and converts it to machine readable digital text format.
					OCR uses a devices that reads pencil marks and converts them into a computer usable form.OCR technology recognizes characters on a source document using the optical properties of the equipmentand media.</P>
					<span class="fa fa-cog" aria-hidden="true"></span>
				</div>
				<div class="image1 pt-0">
				<h4>Function</h4>
					<p class="mt-3">OCR software works with your scanner to convert printed characters into digital text allowing yoiu to search for or edit your document in a word processing program.</P>
					<span class="fas fa-graduation-cap"></span>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- welcome -->

<!-- /stats -->
<section class="stats_test">
	<div class="image-layer">
	<div class="container py-sm-5 py-3">
		<h3 class="heading text-capitalize mb-lg-5 mb-4"> OCR - <span>Optical Character Recognition</span> </h3>
			<div class="col-lg-12 col-md-12 col-12 mt-md-0 mt-4 stat_grid1">
				<h4>Facts </h4>
				<p class="second_para">Optical character recognition (OCR) is a scanning feature that reads and extracts printed text and converts the required information into digital format, allowing you to store, display, search and edit your files and documents with ease and efficiency. If you want to digitize your invoices, receipts, or any type of business document, OCR can help you do that. With OCR, what could take you hours to type, edit and organize can now take minutes.</p>
			</div>
		</div>
	</div>
</section>
<!-- //stats -->

<!-- about -->
<section class="about py-5">
	<div class="container py-sm-3">
		<h3 class="heading text-capitalize mb-lg-5 mb-4"> About - <span> Optical Character Recognition</span> </h3>
		<div class="row about-grids">
			<div class="col-lg-12">
				<h4>OCR</h4>
				<p class="mb-3">Optical character recognition (also optical character reader, OCR) is the mechanical or electronic conversion of images of typed, handwritten or printed text into machine-encoded text, whether from a scanned document, a photo of a document, a scene-photo (for example the text on signs and billboards in a landscape photo) or from subtitle text superimposed on an image (for example from a television broadcast).</p>
				<p></p>
			</div>
		</div>
	</div>
</section>
<!-- //about -->

<?php include_once("include/footer.php"); ?>