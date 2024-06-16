<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage User Training</h3>
                    </div><!-- /.box-header -->
                    <?php if(isset($_GET['msg']) && $_GET['msg']==1){ ?>
                        <h4 style="color:green; padding-left:10px;">Record saved</h4>
                    <?php } else if(isset($_GET['msg']) && $_GET['msg']==2){ ?>
                        <h4 style="color:red; padding-left:10px;">Something went wrong. Please try again</h4>
                    <?php }  else if(isset($_GET['msg']) && $_GET['msg']==3){ ?>
                        <h4 style="color:red; padding-left:10px;">Unauthorised Access</h4>
                    <?php } else if(isset($_GET['msg']) && $_GET['msg']==4){ ?>
                        <h4 style="color:green; padding-left:10px;">Record update</h4>
                    <?php } else if(isset($_GET['msg']) && $_GET['msg']==5){ ?>
                        <h4 style="color:green; padding-left:10px;">Record deleted</h4>
                    <?php } ?>
                    <div class="box-header">
                        <a href="addUserTraining.php" class="btn btn-primary">Add Record</a>
                    </div>
                    <div class="box-body">
                        <?php
                        $selData = "SELECT user.*, training_master.*, user_training.*, user_training.created_date as userTrainingDate
                                    FROM  user, training_master, user_training
                                    WHERE user.u_id = user_training.u_id
                                    AND training_master.t_m_id = user_training.t_m_id
                                    order by user_training.created_date DESC";
                        $rsSelData = mysqli_query($conn, $selData);
                        $countData = mysqli_num_rows($rsSelData);
                        ?>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Training</th>
                                    <th>Training Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            echo "<tbody>";
                            if(!empty($countData)){
                                while($row = mysqli_fetch_array($rsSelData)){
                                    $u_t_id = $row['u_t_id'];
                                    $u_id = $row['u_id'];
                                    $u_name = $row['u_name'];
                                    $t_name = $row['t_name'];
                                    $t_type_id = $row['t_type_id'];
                                    if($t_type_id == 1){
                                        $trainingStatus = 'Training Given';
                                    }else if($t_type_id == 2){
                                        $trainingStatus = 'Training On Hold';
                                    }else{
                                        $trainingStatus = 'Request Under Process';
                                    }
                                    $created_date = date("Y-m-d", strtotime($row['userTrainingDate']));
                            ?>
                                <tr>
                                    <td><?php echo $u_name; ?></td>
                                    <td><?php echo $t_name; ?></td>
                                    <td><?php echo $trainingStatus; ?></td>
                                    <td><?php echo $created_date; ?></td>
                                    <td>
                                        <a href="frmUpdateUserTraining.php?id=<?php echo $u_t_id; ?>"><i class="fa fa-edit"></i></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="code/usertrainingcode.php?del=<?php echo $u_t_id; ?>" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            echo "</tbody>";    
                            } ?>
                        </table>
                    </div>    
                </div>
            </div>    
        </div>
    </div>
        <?php require_once("include/footer.php"); ?>
        
        <script type="text/javascript">
            $(function () {
                $("#example").dataTable();
            });
        </script>
    </body>
</html>    