<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Add User Training</h3>
                        </div>
                        <form role="form" method="post" name="frmAdmin" action="code/usertrainingcode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Select User</label>
                                    <select required="" class="form-control" id="userId" name="userId">
                                        <option value="">Select User</option>
                                        <?php
                                        $selUser = "SELECT * FROM user ORDER BY u_name ASC";
                                        $rsSelUser = mysqli_query($conn, $selUser);
                                        $countUser = mysqli_num_rows($rsSelUser);
                                        if(!empty($countUser)){
                                            while($row = mysqli_fetch_array($rsSelUser)){
                                                $u_id = $row['u_id'];
                                                $u_name = $row['u_name'];
                                            ?>
                                            <option value="<?php echo $u_id; ?>"><?php echo $u_name; ?></option>
                                            <?php    
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Select Training</label>
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
                                            ?>
                                            <option value="<?php echo $t_m_id; ?>"><?php echo $t_type; ?>
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
                                <button type="submit" name="btnNewUserTraining" class="btn btn-primary">Submit</button>
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
