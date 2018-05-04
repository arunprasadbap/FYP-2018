<?php session_start(); ?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Page</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/layout.css" rel="stylesheet">
        <style type="text/css">
            .caption {
                position: absolute;
                bottom: 0;
                right: 0;
                background: rgba(0, 0, 0, 0.57);
                width: 100%;
                height: 45%;
                padding: 2%;
                display: none;
                text-align: center;
                color: #fff !important;
                z-index: 2;
            }

            textarea {
                resize: none;
            }

            .thumbnail {
                position: relative;
                border: 1px solid #BDC3C7;

                padding: 10px;
                margin: 5px;
                background-color: #EAEDF2;
            }

            .frow {
                position: relative;

            }

            .frow, .secrow, .thirdrow {
                margin: 5px 0;
            }

            .secrow {
                position: relative;
            }

            .dasboard-img {
                width: 100%;
            }

            @media screen and (min-width: 992px) {
                .view-menu{
                    margin: 20px 200px 20px 200px;
                }
            }
            @media screen and (max-width: 992px) {
               .col-width{
                   width: 50%;
               }
            }
        </style>

    </head>

    <body>

    <!--Nav-->
    <?php require 'navAdmin.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row view-menu">
            <div class="col-sm-4 col-xs-4 col-width">
                <div class="thumbnail">
                    <div class="secrow">
                        <a href="adduser.php" alt="Add Users">
                            <div class="caption">
                                Add Users
                            </div>
                            <img src="img/icons/add_user_group-512.png" class="img-responsive dasboard-img">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 col-width">
                <div class="thumbnail">
                    <div class="secrow">
                        <a href="viewuser.php" alt="View Users">
                            <div class="caption">
                                View Users
                            </div>
                            <img src="img/icons/view-512.png" class="img-responsive dasboard-img">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 col-width">
                <div class="thumbnail">
                    <div class="secrow">
                        <a href="addamount.php" alt="Add Cards">
                            <div class="caption">
                                Add Credits
                            </div>
                            <img src="img/icons/cards.png" class="img-responsive dasboard-img">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 col-width">
                <div class="thumbnail">
                    <div class="secrow">
                        <a href="" alt="View Foodlist">
                            <div class="caption">
                                View Foodlist
                            </div>
                            <img src="img/icons/foodlist.png" alt="View Foodlist" class="img-responsive dasboard-img">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 col-width">
                <div class="thumbnail">
                    <div class="secrow">
                        <a href="" alt="View Reports">
                            <div class="caption">
                                View Reports
                            </div>
                            <img src="img/icons/reports.png" alt="View Reports" class="img-responsive dasboard-img">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 col-width">
                <div class="thumbnail">
                    <div class="secrow">
                        <a href="script/logout.php" alt="Logout">
                            <div class="caption">
                                Logout
                            </div>
                            <img src="img/icons/logout.png" alt="Logout" class="img-responsive dasboard-img">
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-3 col-xs-6">
                <div class="thumbnail">
                    <div class="secrow">
                        <div class="caption">
                            Gwapo Alright!
                        </div>
                        <img src="http://2.bp.blogspot.com/-KeE6_FqMIdQ/UiAiISyFPkI/AAAAAAAAAMk/wHlSFs9VE5U/s1600/388686_10150397393158915_161162533914_8531679_552579994_n_large.jpg" alt="" class="img-responsive" style="width:100%">
                    </div>
                   </div>
            </div> -->


        </div>
    </div>


    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php require 'footer.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <!-- <script src="jquery.min.js"></script>-->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
   

    <script>
        $(document).ready(function () {

            $('.thumbnail').hover(
                function () {
                    $(this).find('.caption').slideDown(300); //.fadeIn(250)
                },
                function () {
                    $(this).find('.caption').slideUp(200); //.fadeOut(205)
                }
            );


        });
    </script>
    </body>

    </html>
<?php else:
    header("Location: index.php");
    die(); ?>
<?php endif; ?> 