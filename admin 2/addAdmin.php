<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Add Admin User</h3>
                        </div>
                        <form role="form" method="post" name="frmAdmin" action="code/admincode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" required="" class="form-control" id="adminName" name="adminName" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" required="" class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" required="" class="form-control" id="adminPassword" name="adminPassword" placeholder="Password">
                                </div>
                                
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="btnNewAdmin" class="btn btn-primary">Submit</button>
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
