<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage User Document</h3>
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
                    <?php
                    $u_id = $_GET['u_id'];
                    $selUser = "SELECT * FROM user where u_id = '".$u_id."'";
                    $rsSelUser = mysqli_query($conn, $selUser);
                    $countUser = mysqli_num_rows($rsSelUser);
                    if(!empty($countUser)){
                        $userData = mysqli_fetch_assoc($rsSelUser);
                        $userName = $userData['u_name'];
                        echo "<h3 class='col-md-6 pull-left'>". ucfirst($userName) . "'s Document.</h3>";
                        echo "<a class='col-md-6 pull-right text-right' href='usermaster.php'>Back</a>";
                        echo "<div style='clear:both;'></div>";
                    }
                    ?>
                    <div class="box-body">
                        <?php
                        $selData = "SELECT *
                                    FROM user_document 
                                    WHERE u_id = '".$u_id."' 
                                    order by created_date DESC";
                        $rsSelData = mysqli_query($conn, $selData);
                        $countData = mysqli_num_rows($rsSelData);
                        ?>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                    <th>Document</th>
                                    <th>OCR Text</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            echo "<tbody>";
                            if(!empty($countData)){
                                while($row = mysqli_fetch_array($rsSelData)){
                                    $userDocId = $row['user_doc_id'];
                                    $userId = $row['u_id'];
                                    $document = str_replace("uploads/","",$row['doc_name']);
                                    $ocrData = $row['ocr_response'];
                                    if(!empty($ocrData)){
                                        $ocr = json_decode(preg_replace("/[\r\n]+/", " ", $ocrData));
                                        $fetchedText = $ocr->data->text;
                                    }else{
                                        $fetchedText = '';
                                    }
                                    $created_date = date("Y-m-d", strtotime($row['created_date']));
                            ?>
                                <tr>
                                    <td><a href="../<?php echo $row['doc_name']; ?>" target="_blank"><?php echo $document; ?></a></td>
                                    <td>
                                        <?php if(!empty($ocrData)){ ?>
                                        <a href="javascript:void(0);" class="openOCRText" data-url="<?php echo $fetchedText; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                        <?php } ?>
                                </td>
                                    <td><?php echo $created_date; ?></td>
                                    <td>
                                        <a href="code/userdocumentcode.php?doc_id=<?php echo $userDocId; ?>&u_id=<?php echo $userId; ?>" title="Delete Documents" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete document?');"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="openOCRText" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase" id="exampleModalLabel1">OCR Text</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p id="ocrText"></p>
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
        <script>
		$(".openOCRText").click(function(){
			var text = $(this).attr('data-url');
			$("#openOCRText").modal('show');
			$("#ocrText").html('');
			$("#ocrText").html(text);
		});
	</script>
    </body>
</html>    