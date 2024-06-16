<?php
include_once("include/header.php");
if (isset($_SESSION['login_user'])) {
    ?>

    <!-- inner banner -->
    <div class="inner_banner layer" id="home">
        <div class="container">
            <div class="agileinfo-inner">
                <h2 class="text-center text-white">
                    My Documents
                </h2>
            </div>
        </div>
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">My Document</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->


    <!-- services -->
    <section class="services py-5">
        <div class="container py-sm-3">
            <div class="row">
                <?php if (isset($_GET['msg']) && $_GET['msg'] == 1) { ?>
                    <h4 style="color:green; padding-left:10px;">Record saved</h4>
                <?php } else if (isset($_GET['msg']) && $_GET['msg'] == 2) { ?>
                    <h4 style="color:red; padding-left:10px;">Something went wrong. Please try again</h4>
                <?php } else if (isset($_GET['msg']) && $_GET['msg'] == 3) { ?>
                    <h4 style="color:red; padding-left:10px;">Unauthorised Access</h4>
                <?php } else if (isset($_GET['msg']) && $_GET['msg'] == 4) { ?>
                    <h4 style="color:green; padding-left:10px;">Record update</h4>
                <?php } else if (isset($_GET['msg']) && $_GET['msg'] == 5) { ?>
                    <h4 style="color:green; padding-left:10px;">Record deleted</h4>
                <?php } else if (isset($_GET['msg']) && $_GET['msg'] == 6) { ?>
                    <h5 style="color:red; padding-left:10px;">Document type not allowed. Contact Admin.</h5>
                <?php } else if (isset($_GET['msg']) && $_GET['msg'] == 7) { ?>
                    <h5 style="color:red; padding-left:10px;">OCR Conversion LIMIT Over. Please change API Key</h5>
                <?php } ?>
            </div>
            <div class="row" style="padding-bottom:5px;">
                <a href="uploadfile.php" class="btn btn-primary">Upload New File</a>
            </div>
            <div class="row service-grids">
                <?php
                $selUserDocument = "SELECT user.*, user_document.*, user_document.created_date as uploadDate 
								FROM user, user_document
								WHERE user.u_id = '" . $_SESSION['login_user']['u_id'] . "'
								AND user.u_id = user_document.u_id
								ORDER BY user_document.created_date DESC";
                $selUserDocumentRes = mysqli_query($conn, $selUserDocument);
                $documentCount = mysqli_num_rows($selUserDocumentRes);
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($documentCount)) {
                        while ($document = mysqli_fetch_array($selUserDocumentRes)) {
                            $name = str_replace("uploads/", "", $document['doc_name']);
                            $date = $document['uploadDate'];

                            $user_doc_id = $document['user_doc_id'];
                            $imageName = $document['doc_name'];
                            $ocrData = $document['ocr_response'];
                            if (!empty($ocrData)) {
                                $ocr = json_decode(preg_replace("/[\r\n]+/", " ", $ocrData));
                                $fetchedText = $ocr->data->text;
                            } else {
                                $fetchedText = '';
                            }

                            $selExportFile = "SELECT * FROM user_export_file WHERE user_doc_id = '" . $user_doc_id . "'";
                            $rsSelExportFile = mysqli_query($conn, $selExportFile);
                            $countExportFile = mysqli_num_rows($rsSelExportFile);
                            if (!empty($countExportFile)) {
                                $exportData = mysqli_fetch_assoc($rsSelExportFile);
                                $exportFile = $exportData['exp_name'];
                            } else {
                                $exportFile = '';
                            }
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td>
                                        <a href="<?php echo $imageName; ?>" target="_blank">Download File</a>
                                        <?php if (!empty($ocrData)) { ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="javascript:void(0);" class="openOCRText" data-url="<?php echo $fetchedText; ?>">
                                                View OCR Text
                                            </a>
                                            <?php if (!empty($exportFile)) { ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="<?php echo $exportFile; ?>" target="_blank">
                                                    Export File
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="removedocumentcode.php?del=<?php echo $user_doc_id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    } else {
                        ?>
                        <tbody>
                            <tr>
                                <td colspan="3">No Document Found</td>
                            </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <!-- //services -->

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

    <?php include_once("include/footer.php"); ?>
    <script>
        $(".openOCRText").click(function () {
            var text = $(this).attr('data-url');
            $("#openOCRText").modal('show');
            $("#ocrText").html('');
            $("#ocrText").html(text);
        });
    </script>
<?php
} else {
    header('location:index.php');
    exit;
}
?>