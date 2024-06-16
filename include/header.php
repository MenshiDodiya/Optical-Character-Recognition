<?php 
	session_start(); 
	require_once('db/configuration.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Optical Character Recognition System</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content=" " />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
    
	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<link rel="stylesheet" href="css/jquery.countdown.css" />

	<!--web font-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans+Caption:400,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<!--//web font-->

</head>

<body>


<!-- header -->
<header>
	<div class="container">
		<!-- top header -->
		<section class="row top_header pt-3">
			<div class="col-lg-4">
			</div>
			<?php 
			if(!isset($_SESSION['login_user'])){?>
				<div class="col-lg-8 buttons">
					<!--<p><i class="fas mr-1 fa-phone"></i>8264988599</p>-->
					<button type="button" class="btn btn-info btn-lg-block w3ls-btn px-4 text-capitalize mr-2" data-toggle="modal"
						aria-pressed="false" data-target="#exampleModal">
						Login
					</button>
					
					<button type="button" class="btn btn-info1 btn-lg-block w3ls-btn1 px-4 text-capitalize" data-toggle="modal" aria-pressed="false" 
					data-target="#exampleModal1">
						Register
					</button>
					</div>
			<?php } else {?>
					<div class="col-lg-8 buttons">
						<a class="btn btn-info1 btn-lg-block w3ls-btn px-4 text-capitalize mr-2" href="training.php">Request Training</a>
						<a class="btn btn-info1 btn-lg-block w3ls-btn px-4 text-capitalize mr-2" href="mydocument.php">My Document</a>
						<button type="button" class="btn btn-info1 btn-lg-block w3ls-btn1 px-4 text-capitalize" data-toggle="modal" aria-pressed="false" data-target="#updateModal">Update Profile</button>
						<a class="btn btn-info btn-lg-block w3ls-btn px-4 text-capitalize mr-2"  href="logout.php">Logout</a>
					</div>
			<?php }?>
					
		</section>
		<!-- top header -->

		<!-- nav -->
		<nav class="navbar navbar-expand-lg navbar-light py-sm-4 py-2">
			<!-- logo -->
			<h2>
				<a class="navbar-brand" href="index.php" style="color:#17a2b8 !important;"> <i class="fab fa-affiliatetheme">
				</i>
					Optical Character Recognition
				</a>
			</h2>
			<!-- //logo -->
			<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- main nav -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-lg-auto text-center">
					<li class="nav-item active  mr-lg-3">
						<a class="nav-link" href="index.php">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item mr-lg-3">
						<a class="nav-link" href="about.php">about</a>
					</li>
					<li class="nav-item mr-lg-3">
						<a class="nav-link" href="services.php">Services</a>
					</li>
					<!--li class="dropdown nav-item mr-lg-3">
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle ">
							Pages
							<b class="caret"></b>
						</a-->
						<!--ul class="dropdown-menu" role="menu">
							<li class="nav-item">
								<a href="course.html" class="nav-link">Courses</a>
							</li>
							<li class="nav-item">
								<a href="error.html" class="nav-link">404</a>
							</li>
						</ul-->
					</li>
					<li class="nav-item mr-3">
						<a class="nav-link" href="contact.php">contact</a>
					</li>
					<!-- search --->
					<!--div class="search-bar-agileits">
						<div class="cd-main-header">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul>
						</div>
						<div id="cd-search" class="cd-search">
							<form action="#" method="post">
								<input name="Search" type="search" placeholder="Click enter after typing...">
							</form>
						</div>
					</div-->
					<!-- search --->
				</ul>
			</div>
			<!-- //main nav -->
		</nav>
		<!-- //nav -->
	</div>
</header>
<!-- //header -->