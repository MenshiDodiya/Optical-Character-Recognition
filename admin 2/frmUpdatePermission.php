<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update Permission</h3>
                        </div>
                        <?php
                        $pmid = $_GET['id'];
                        $selData = "SELECT * FROM permission_master WHERE p_m_id = '".$pmid."'";
                            $rsSelData = mysqli_query($conn, $selData);
                            $data = mysqli_fetch_assoc($rsSelData);
                            $p_m_id = $data['p_m_id'];
                            $p_name = $data['p_name'];
                            $permission = $data['permission'];
                        ?>
                        <form role="form" method="post" name="frmAdmin" action="code/permissioncode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Permission</label>
                                    <input type="text" required="" class="form-control" id="permissionName" name="permissionName" placeholder="Enter Permission" value="<?php echo $p_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Detail</label>
                                    <input type="text" required="" class="form-control" id="permissionDetail" name="permissionDetail" placeholder="Enter Detail" value="<?php echo $permission; ?>">
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="perm_id"; value="<?php echo $p_m_id; ?>">
                                <button type="submit" name="btnUpdatePermission" class="btn btn-primary">Submit</button>
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