<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update User Permission</h3>
                        </div>
                        <form role="form" method="post" name="frmAdmin" action="code/userpermissioncode.php">
                            <?php
                            $u_p_id = $_GET['id'];
                            $selData = "SELECT * FROM user_permission WHERE u_p_id = '".$u_p_id."'";
                            $rsSelData = mysqli_query($conn, $selData);
                            $data = mysqli_fetch_assoc($rsSelData);
                            $u_p_id = $data['u_p_id'];
                            $db_u_id = $data['u_id'];
                            $db_p_m_id = $data['p_m_id'];
                            ?>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Select User</label>
                                    <select readonly="readonly" class="form-control" id="userId" name="userId" >
                                        <option value="">Select User</option>
                                        <?php
                                        $selUser = "SELECT * FROM user ORDER BY u_name ASC";
                                        $rsSelUser = mysqli_query($conn, $selUser);
                                        $countUser = mysqli_num_rows($rsSelUser);
                                        if(!empty($countUser)){
                                            while($row = mysqli_fetch_array($rsSelUser)){
                                                $u_id = $row['u_id'];
                                                $u_name = $row['u_name'];
                                                if($db_u_id == $u_id){
                                                    $userSelected = "selected = 'selected'";
                                                }else{
                                                    $userSelected = '';
                                                }
                                            ?>
                                            <option value="<?php echo $u_id; ?>" <?php echo $userSelected; ?>><?php echo $u_name; ?></option>
                                            <?php    
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Select Permission</label>
                                    <select required="" class="form-control" id="permission" name="permission">
                                        <option value="">Select User</option>
                                        <?php
                                        $selPerm = "SELECT * FROM permission_master ORDER BY created_date ASC";
                                        $rsSelPerm = mysqli_query($conn, $selPerm);
                                        $countPerm = mysqli_num_rows($rsSelPerm);
                                        if(!empty($countPerm)){
                                            while($permRow = mysqli_fetch_array($rsSelPerm)){
                                                $p_m_id = $permRow['p_m_id'];
                                                $permission = $permRow['permission'];
                                                $p_name = $permRow['p_name'];
                                                if($db_p_m_id == $p_m_id){
                                                    $selected = "selected = 'selected'";
                                                }else{
                                                    $selected = '';
                                                }
                                            ?>
                                            <option value="<?php echo $p_m_id; ?>" <?php echo $selected; ?>><?php echo $p_name. "(". $permission .")"; ?>
                                            </option>
                                            </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="u_p_id"; value="<?php echo $u_p_id; ?>">
                                <input type="hidden" name="db_u_id"; value="<?php echo $db_u_id; ?>">
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
