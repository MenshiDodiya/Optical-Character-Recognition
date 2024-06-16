<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update User Training</h3>
                        </div>
                        <form role="form" method="post" name="frmAdmin" action="code/usertrainingcode.php">
                            <?php
                            $u_t_id = $_GET['id'];
                            $selData = "SELECT * FROM user_training WHERE u_t_id = '".$u_t_id."'";
                            $rsSelData = mysqli_query($conn, $selData);
                            $data = mysqli_fetch_assoc($rsSelData);
                            $u_t_id = $data['u_t_id'];
                            $db_u_id = $data['u_id'];
                            $db_t_m_id = $data['t_m_id'];
                            $db_t_type_id = $data['t_type_id'];
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
                                    <select required="" class="form-control" id="training" name="training">
                                        <option value="">Select Training</option>
                                        <?php
                                        $selTraining = "SELECT * FROM training_master ORDER BY created_date ASC";
                                        $rsSelTraining = mysqli_query($conn, $selTraining);
                                        $countTraining = mysqli_num_rows($rsSelTraining);
                                        if(!empty($countTraining)){
                                            while($trainingRow = mysqli_fetch_array($rsSelTraining)){
                                                $t_m_id = $trainingRow['t_m_id'];
                                                $t_type = $trainingRow['t_type'];
                                                if($db_t_m_id == $t_m_id){
                                                    $tSelected = "selected = 'selected'";
                                                }else{
                                                    $tSelected = '';
                                                }
                                            ?>
                                            <option value="<?php echo $t_m_id; ?>" <?php echo $tSelected; ?>><?php echo $t_type; ?>
                                            </option>
                                            </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Trainig Status</label>
                                    <select class="form-control" id="t_type_id" name="t_type_id" >
                                        <option value="" <?php if($db_t_type_id=='' || $db_t_type_id==NULL || $db_t_type_id==0){ echo "selected='selected'"; } ?>>Reqeust Under Process</option>
                                        <option value="1" <?php if($db_t_type_id=='1'){ echo "selected='selected'"; } ?>>Training Given</option>
                                        <option value="2" <?php if($db_t_type_id=='2'){ echo "selected='selected'"; } ?>>Training on hold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="u_t_id"; value="<?php echo $u_t_id; ?>">
                                <input type="hidden" name="db_u_id"; value="<?php echo $db_u_id; ?>">
                                <button type="submit" name="btnUpdateTraining" class="btn btn-primary">Submit</button>
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
