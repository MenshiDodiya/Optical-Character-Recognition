<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Add Permission</h3>
                        </div>
                        <form role="form" method="post" name="frmAdmin" action="code/permissioncode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Permission</label>
                                    <input type="text" required="" class="form-control" id="permissionName" name="permissionName" placeholder="Enter Permission">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Detail</label>
                                    <input type="text" required="" class="form-control" id="permissionDetail" name="permissionDetail" placeholder="Enter Detail">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="btnNewPermission" class="btn btn-primary">Submit</button>
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