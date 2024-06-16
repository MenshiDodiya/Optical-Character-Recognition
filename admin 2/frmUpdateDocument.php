<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update Document</h3>
                        </div>
                        <?php
                        $doc_m_id = $_GET['id'];
                        $selData = "SELECT * FROM document_master WHERE doc_m_id = '".$doc_m_id."'";
                            $rsSelData = mysqli_query($conn, $selData);
                            $data = mysqli_fetch_assoc($rsSelData);
                            $doc_m_id = $data['doc_m_id'];
                            $doc_type = $data['doc_type'];
                            $doc_name = $data['doc_name'];
                        ?>
                        <form role="form" method="post" name="frmAdmin" action="code/documentcode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Document Type</label>
                                    <input type="text" required="" class="form-control" id="documentType" name="documentType" placeholder="Enter Document Type" value="<?php echo $doc_type; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Detail</label>
                                    <input type="text" required="" class="form-control" id="documentDetail" name="documentDetail" placeholder="Enter Detail" value="<?php echo $doc_name; ?>">
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="doc_m_id"; value="<?php echo $doc_m_id; ?>">
                                <button type="submit" name="btnUpdateDocument" class="btn btn-primary">Submit</button>
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
