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
            
            <div class="row" style="padding-bottom:5px;">
                <a href="uploadfile.php" class="btn btn-primary">Upload New File</a>
            </div>
            <div class="row service-grids">
              
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Document</th>
                            <th>File</th>
                          
                            <th>Date</th>
                            <th>Action</th>
                            <?php
                            
                            $q = mysqli_query($conn, "select * from user_document where u_id='{$_SESSION['login_user']['u_id']}'") or die(mysqli_error($conn));
                            
                            while($data = mysqli_fetch_array($q))
                            {
                                echo "<tr>";
                                
                                echo "<td>{$data['user_doc_id']}</td>";
                                echo "<td><a href='{$data['doc_name']}' target='_blank'>{$data['doc_name']}</a></td>";
                                echo "<td><a href='images/{$data['upload_response']}'  target='_blank'>{$data['upload_response']}</a></td>";
                                echo "<td>{$data['created_date']}</td>"; 
                                 echo "<td><a href='class/sendmail.php?filename={$data['doc_name']}'  target='_blank'>Send Email</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                    </thead>
                    
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