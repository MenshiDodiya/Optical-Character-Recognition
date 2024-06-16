<?php 
 
	include_once("include/header.php"); 
	if(isset($_SESSION['login_user'])){
?>

 <!-- inner banner -->
    <div class="inner_banner layer" id="home">
        <div class="container">
            <div class="agileinfo-inner">
                <h2 class="text-center text-white">
                    Upload Document
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
            <li class="breadcrumb-item active" aria-current="page">My Document</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->

	
<!-- services -->
<section class="services py-5">
	<div class="container py-sm-3">
        <div class="row service-grids">
        <form action="upload.php" method="post" class="p-3" enctype="multipart/form-data">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Upload File</label>
                <input type="file" class="form-control" name="image" id="fileToUpload" required="">
            </div>
            
            <div class="right-w3l mt-4 mb-3">
                <input type="submit" name="btnUpload" class="form-control" value="Submit">
            </div>
        </form>
            
            
		</div>
	</div>
</section>
<!-- //services -->

	<?php include_once("include/footer.php"); ?>
<?php } else {
	header('location:index.php');
	exit;
}
?>