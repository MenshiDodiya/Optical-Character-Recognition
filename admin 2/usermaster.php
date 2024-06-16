<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage User</h3>
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
                        $selUser = "SELECT * FROM user order by u_id DESC";
                        $rsSelUser = mysqli_query($conn, $selUser);
                        $countUser = mysqli_num_rows($rsSelUser);
                        ?>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            echo "<tbody>";
                            if(!empty($countUser)){
                                while($user = mysqli_fetch_array($rsSelUser)){
                                    $userId = $user['u_id'];
                                    $username = $user['u_name'];
                                    $contactnumber = $user['u_contact_no'];
                                    $email = $user['u_email_id'];
                                    $created_date = date("Y-m-d", strtotime($user['created_date']));
                            ?>
                                <tr>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $contactnumber; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $created_date; ?></td>
                                    <td>
                                        <a href="userDocument.php?u_id=<?php echo $userId; ?>" title="View Documents" data-toggle="tooltip"><i class="fa fa-file"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            echo "</tbody>";    
                            }else{
                            ?>
                            <tbody>

                            </tbody>
                            <?php } ?>
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