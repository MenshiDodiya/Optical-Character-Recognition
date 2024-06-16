<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update Training</h3>
                        </div>
                        <?php
                        $t_m_id = $_GET['id'];
                        $selData = "SELECT * FROM training_master WHERE t_m_id = '".$t_m_id."'";
                        $rsSelData = mysqli_query($conn, $selData);
                        $data = mysqli_fetch_assoc($rsSelData);
                        $t_m_id = $data['t_m_id'];
                        $t_type = $data['t_type'];
                        ?>
                        <form role="form" method="post" name="frmAdmin" action="code/trainingcode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Training Type</label>
                                    <input type="text" required="" class="form-control" id="trainingType" name="trainingType" placeholder="Enter Training Type" value="<?php echo $t_type; ?>">
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="t_m_id"; value="<?php echo $t_m_id; ?>">
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
