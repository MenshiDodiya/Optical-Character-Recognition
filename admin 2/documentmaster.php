<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage Document Type</h3>
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
                        <a href="addDocument.php" class="btn btn-primary">Add Record</a>
                    </div>
                    <div class="box-body">
                        <?php
                        $selData = "SELECT * FROM document_master order by doc_m_id DESC";
                        $rsSelData = mysqli_query($conn, $selData);
                        $countData = mysqli_num_rows($rsSelData);
                        ?>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Detail</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            echo "<tbody>";
                            if(!empty($countData)){
                                while($row = mysqli_fetch_array($rsSelData)){
                                    $doc_m_id = $row['doc_m_id'];
                                    $doc_type = $row['doc_type'];
                                    $doc_name = $row['doc_name'];
                                    $created_date = date("Y-m-d", strtotime($row['created_date']));
                            ?>
                                <tr>
                                    <td><?php echo $doc_type; ?></td>
                                    <td><?php echo $doc_name; ?></td>
                                    <td><?php echo $created_date; ?></td>
                                    <td>
                                        <a href="frmUpdateDocument.php?id=<?php echo $doc_m_id; ?>"><i class="fa fa-edit"></i></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="code/documentcode.php?del=<?php echo $doc_m_id; ?>" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></a>
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