<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage Export Document</h3>
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
                    <div class="box-body">
                        <?php
                        $selData = "SELECT user.*, user_export_file.*, `admin`.*, user_export_file.created_date as exportDate
                                    FROM  user, user_export_file, `admin`
                                    WHERE user.u_id = user_export_file.u_id
                                    AND user_export_file.a_id = `admin`.a_id
                                    order by user_export_file.created_date DESC";
                        $rsSelData = mysqli_query($conn, $selData);
                        $countData = mysqli_num_rows($rsSelData);
                        ?>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Admin Name</th>
                                    <th>User Name</th>
                                    <th>Export Name</th>
                                    <th>Export Type</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            echo "<tbody>";
                            if(!empty($countData)){
                                while($row = mysqli_fetch_array($rsSelData)){
                                    $exp_id = $row['exp_id'];
                                    $u_id = $row['u_id'];
                                    $u_name = $row['u_name'];
                                    $a_name = $row['a_name'];
                                    $exp_name = str_replace("uploads/", "",$row['exp_name']);
                                    $fileName = $row['exp_name'];
                                    $exp_type = $row['exp_type'];
                                    $created_date = date("Y-m-d", strtotime($row['exportDate']));

                                    $selExport = "SELECT * FROM user_export_file WHERE exp_name = '".$fileName."'";
                                    $rsSelExport = mysqli_query($conn, $selExport);
                                    $countExport = mysqli_num_rows($rsSelExport);
                                    if(!empty($countExport)){
                                        $exportData = mysqli_fetch_assoc($rsSelExport);
                                        $exportFile = $exportData['exp_name'];
                                    }else{
                                        $exportFile = '';
                                    }
                            ?>
                                <tr>
                                    <td><?php echo $a_name; ?></td>
                                    <td><?php echo $u_name; ?></td>
                                    <td><?php echo $exp_name; ?></td>
                                    <td><?php echo $exp_type; ?></td>
                                    <td><?php echo $created_date; ?></td>
                                    <td>
                                        <?php if(!empty($exportFile)){ ?>
                                        <a href="../<?php echo $exportFile; ?>" target="_blank"><i class="fa fa-download"></i></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php } ?>
                                        <a href="code/exportcode.php?del=<?php echo $exp_id; ?>" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></a>
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