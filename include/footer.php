<?php 
	include_once('session.php');
	include_once('login.php');
	if(isset($_session['login_user']))
	{
		header("location : index.php");
	}
?>
<!-- footer -->	
<footer>
	<div class="container-fluid p-sm-5 py-5">
		<div class="row footer-gap">
			<div class="col-lg-6 col-md-4 col-sm-6 mt-lg-0 mt-sm-5 mt-4">
				<!--<h3 class="text-uppercase mb-3"> Follow us</h3>
				<p class="mb-4">Follow us on social media</p>
				<ul class="social mt-lg-0 mt-3">
					<li class="mr-1"><a href="#"><span class="fab fa-facebook-f"></span></a></li>
					<li class="mr-1"><a href="#"><span class="fab fa-twitter"></span></a></li>
					<li class="mr-1"><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
					<li class="mr-1"><a href="#"><span class="fab fa-instagram"></span></a></li>
					
				</ul>-->
			</div>
		</div>
	</div>
	<!--div class="copyright pb-5 text-center">
		<p>© 2018 Eduversity. All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a></p>
	</div-->
</footer>
<!-- footer -->

<!-- Login modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase" id="exampleModalLabel1">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="login.php" method="post" class="p-3">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">User Name</label>
							<input type="email" class="form-control" placeholder="email id" name="email" id="recipient-name" required="">
						</div>
						<div class="form-group">
							<label for="recipient-name1" class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="password" id="recipient-name1" required="">
							<?php ?>
						</div>
						<div class="right-w3l mt-4 mb-3">
							<input type="submit" name="btnlogin" class="form-control" value="Login">
						</div>
						
						<div><center>
							<a href="#" data-toggle="modal"
						aria-pressed="false" data-target="#exampleModal3">Forgotten Password?</a>
						</center></div>
						
						<!--<div><center>
						<label for="recipient-name2" class="col-form-label">Or</label>
						</center></div>
						
                        <div><center>
							<a href="#">Change Password</a>
						</center></div>-->
					</form>

				</div>
			</div>
		</div>
	</div>
	
	<!-- //Login modal -->

	<!-- Register modal -->
	<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase" id="exampleModalLabel1">Register Here</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="insertreg.php" method="post" class="p-3">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">First Name</label>
							<input type="text" class="form-control" placeholder="First Name" name="name" id="recipient-name2" required="">
						</div>
						<!--<div class="form-group">
							<label for="recipient-name" class="col-form-label">Last Name</label>
							<input type="text" class="form-control" placeholder="Last Name" name="lname" id="recipient-name3" required="">
						</div>-->
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Email id</label>
							<input type="email" class="form-control" placeholder="Email id" name="email" id="recipient-name4" required="">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Mobile Number</label>
							<input type="number" class="form-control" placeholder="Mobile Number" name="number" id="recipient-name5" required="" maxlength="10 ">
							<?php ?>
						</div>
						<div class="form-group">
							<label for="recipient-name1" class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="pass" id="recipient-name6" required="">
						</div>
						<div class="right-w3l mt-4 mb-3">
							<input type="submit" name="btnsubmit" class="form-control" value="Create account">
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- //Register modal -->

	<!-- forgot password modal -->
	<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase" id="exampleModalLabel1">Forgot Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post" class="p-3">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Email id</label>
							<input type="email" class="form-control" placeholder="email id" name="email" id="email" required="">
						</div>
						
						<div class="right-w3l mt-4 mb-3">
							<input type="submit" name="btnlogin" class="form-control" value="Submit">
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	
	<!-- //forgot pwd modal -->
	
	<!-- logout modal-->
	<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase" id="exampleModalLabel1">
					<a href="logout.php">Logout</a></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- //logout modal-->

	<!-- Update profile modal -->
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase" id="exampleModalLabel1">Update Profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php 
					if(isset($_SESSION['login_user'])){ 
						$u_id = $_SESSION['login_user']['u_id'];
						$selData = "SELECT * FROM user WHERE u_id = ". $u_id;
						$result = mysqli_query($conn, $selData);
						if(!empty($result)){
							$userinfo = mysqli_fetch_assoc($result);
							$u_id = $userinfo['u_id'];
							$u_name = $userinfo['u_name'];
							$u_contact_no = $userinfo['u_contact_no'];
							$u_email_id = $userinfo['u_email_id'];
						}else{
							$u_id = "";
							$u_name = "";
							$u_contact_no = "";
							$u_email_id = "";
						}
					?>
					<form action="updateprofilecode.php" method="post" class="p-3">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">First Name</label>
							<input type="text" class="form-control" placeholder="First Name" name="name" id="name" required="" value="<?php echo $u_name; ?>">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Email id</label>
							<input type="email" class="form-control" placeholder="Email id" name="email" id="email_id" required="" value="<?php echo $u_email_id; ?>" readonly="readonly">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Mobile Number</label>
							<input type="text" class="form-control" placeholder="Mobile Number" name="number" id="number" required="" maxlength = "10" value="<?php echo $u_contact_no; ?>">
							<?php ?>
						</div>
						<div class="form-group">
							<label for="recipient-name1" class="col-form-label">Old Password</label>
							<input type="password" class="form-control" placeholder="Password" name="oldpassword" id="oldPassword">
						</div>
						<div class="form-group">
							<label for="recipient-name1" class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="newpassword" id="newpassword">
						</div>
						<div class="right-w3l mt-4 mb-3">
							<input type="hidden" name="u_id" value="<?php echo $u_id; ?>" />
							<input type="submit" name="btnUpdateProfile" class="form-control" value="Update Profile">
						</div>
					</form>
					<?php }  else { ?>
					<h4>Please login to update your profile</h4>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
	<!-- //Update profile modal -->
	
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->	
	
	<!-- search-bar -->
	<script src="js/main.js"></script>
	<!-- //search-bar -->
	
	<!-- Countdown-Timer-JavaScript -->
	<script src="js/simplyCountdown.js"></script>
	<!-- easy to customize -->
	<script>
		/*$('#simply-countdown-losange').simplyCountdown({
			year: 2020,
			month: 1,
			day: 06
		});*/
	</script>
	<!-- //Countdown-Timer-JavaScript -->
	
	<!-- start-smoth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

</body>
</html>