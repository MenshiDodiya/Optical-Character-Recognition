<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage Share Document</h3>
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
                        $selData = "SELECT user.*, user_share_document.*, user_share_document.created_date as shareDate
                                    FROM  user, user_share_document
                                    WHERE user.u_id = user_share_document.u_id
                                    order by user_share_document.created_date DESC";
                        $rsSelData = mysqli_query($conn, $selData);
                        $countData = mysqli_num_rows($rsSelData);
                        ?>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Document Name</th>
                                    <th>Share Type</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            echo "<tbody>";
                            if(!empty($countData)){
                                while($row = mysqli_fetch_array($rsSelData)){
                                    $doc_id = $row['doc_id'];
                                    $u_id = $row['u_id'];
                                    $u_name = $row['u_name'];
                                    $doc_name = $row['doc_name'];
                                    $share_type = $row['share_type'];
                                    $created_date = date("Y-m-d", strtotime($row['shareDate']));
                            ?>
                                <tr>
                                    <td><?php echo $u_name; ?></td>
                                    <td><?php echo $doc_name; ?></td>
                                    <td><?php echo $share_type; ?></td>
                                    <td><?php echo $created_date; ?></td>
                                    <td>
                                        <a href="code/sharedocumentcode.php?del=<?php echo $doc_id; ?>" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></a>
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