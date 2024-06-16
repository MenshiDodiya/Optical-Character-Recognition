<?php require_once("include/header.php"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Add Training Type</h3>
                        </div>
                        <form role="form" method="post" name="frmAdmin" action="code/trainingcode.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Document Type</label>
                                    <input type="text" required="" class="form-control" id="trainingType" name="trainingType" placeholder="Enter Training Type">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="btnNewTraining" class="btn btn-primary">Submit</button>
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