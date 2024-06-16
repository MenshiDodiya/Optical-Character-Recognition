<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update Admin User</h3>
                        </div>
                        <?php
                        $adminId = $_GET['id'];
                        if($adminId==1){
                            header("location:adminmaster.php?msg=3");
                            exit;
                        }else{
                            $selData = "SELECT * FROM admin WHERE a_id = '".$adminId."'";
                            $rsSelData = mysqli_query($conn, $selData);
                            $adminData = mysqli_fetch_assoc($rsSelData);
                            $adminId = $adminData['a_id'];
                            $adminName = $adminData['a_name'];
                            $adminEmail = $adminData['a_email_id'];
                        }

                        ?>
                        <form role="form" method="post" name="frmAdmin" action="code/admincode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" required="" class="form-control" id="adminName" name="adminName" placeholder="Enter name" value="<?php echo $adminName; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" required="" class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter email" value="<?php echo $adminEmail; ?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">New Password</label>
                                    <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Password">
                                </div>
                                
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="admin_id"; value="<?php echo $adminId; ?>">
                                <button type="submit" name="btnUpdateAdmin" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require_once("include/footer.php"); ?>
    </body>
</html>
