<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage Contact Form Data</h3>
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
                        $selContact = "SELECT * FROM contact_inquiry order by created_date DESC";
                        $rsSelContact = mysqli_query($conn, $selContact);
                        $countContact = mysqli_num_rows($rsSelContact);
                        ?>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            echo "<tbody>";
                            if(!empty($countContact)){
                                while($row = mysqli_fetch_array($rsSelContact)){
                                    $contact_id = $row['contact_id'];
                                    $firstname = $row['firstname'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $message = $row['message'];
                                    $created_date = date("Y-m-d", strtotime($row['created_date']));
                            ?>
                                <tr>
                                    <td><?php echo $firstname; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $phone; ?></td>
                                    <td><?php echo $message; ?></td>
                                    <td><?php echo $created_date; ?></td>
                                    <td>
                                        <a href="code/contactcode.php?del=<?php echo $contact_id; ?>" title="Delete Data" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></a>
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