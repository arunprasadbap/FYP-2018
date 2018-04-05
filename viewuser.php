<?php session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 1):
    include_once "script/pagination.php";

    $con = mysqli_connect("localhost", "root", "rootroot", "canteen");
    
    //next page after clicking on pagination icon
    $targetpage = "viewuser.php";
    // Number adjacent pages should be shown on each side
    $adjacents = 3;
    $limit = 2;
    $page = $_GET['page'];

    $k = isset($_GET['k']) ? $_GET['k'] : "";
    $searchString = "";

    if (!empty($k) && !isset($_GET['limit'])) {
        $searchString = "WHERE userid LIKE '%" . $k . "%'";
    }

    $totalCountInfo = mysqli_query($con, "select Count(*) as num from account $searchString");
    $total_pages = mysqli_fetch_assoc($totalCountInfo);
    $total_pages = $total_pages[num]; //query for getting total number

    $limitShow = $limit;



    if(isset($_GET['limit'])){
        $limit = $total_pages;
        if($_GET['limit'] != 'All')
            $limit = $_GET['limit']; // Number of row  to show

        $limitShow =  $_GET['limit'];
    }

    if ($page)
        $start = ($page - 1) * $limit;
    else
        $start = 0;

    
    $string = "SELECT * FROM account $searchString Limit $start, $limit";
    $rs = mysqli_query($con, $string); //added limit in the query
    $data = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $data[] = $row;
    }

    $pagination = pagination($page, $limit, $adjacents, $total_pages, $targetpage, $k,$limit);

    $showList = array(1,2,3,'All');

    if(!empty($k)){
        $limitShow = "Select";
        $showList[] = "Select";
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>View User Page</title>
        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/layout.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    </head>

    <body>

    <!--Nav-->
    <?php require 'navAdmin.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row main">
            <div class="main-login main-center">
                <h1>USER LIST</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <form action ="" method="get">
                    <div class="input-group">
                            <input type="text" class="form-control" name="k" placeholder="Search ID for...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3 show">
                <form action="viewuser.php" method="get">
                    <div class="input-group">
                            <label>show</label>
                            <select name="limit" class="form-control" onchange="this.form.submit();">
                                <?php foreach($showList as $value): ?>
                                    <option value="<?php echo $value ?>" <?php echo ($value==$limitShow) ? "selected" : "" ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-listing">
            <table id="table" border="1em" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th colspan="2" style="text-align: center; width: 4%">Action</th>
                </tr>
                </thead>

                <tbody id="account">
                <?php foreach ($data as $account) { ?>
                    <tr id="row<?php echo $account['userid']; ?>">
                        <td><?php echo $account['userid']; ?></td>
                        <td class="uname"><?php echo $account['username']; ?></td>
                        <td class="eml"><?php echo $account['email']; ?></td>
                        <td class="amnt"><?php echo $account['amount']; ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#<?php echo "dlv_".$account['userid'] ?>" class="btn btn-primary" type="button">View</button>
                            <div id="<?php echo "dlv_".$account['userid'] ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>Details Information</h3>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>User ID</th>
                                                    <td><?php echo $account['userid']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Username</th>
                                                    <td><?php echo $account['username']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?php echo $account['email']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Amount</th>
                                                    <td><?php echo $account['amount']; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="contact-delete">
                            <form action='delete.php?name="<?php echo $account['userid']; ?>"' method="post">
                                <input type="hidden" name="name" value="<?php echo $account['userid']; ?>">
                                <input type="submit" onClick="if(confirm('Are you sure want to delete this user ?')) { return true; } else { return false; }" class="btn btn-danger" name="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="text-center pagination-list">
            <?php echo $pagination; ?>
        </div>
    </div>
    <!-- Trigger the modal with a button -->

        <!-- Footer -->
        <?php require 'footer.php'; ?>
        </footer>

        <!-- Bootstrap core JavaScript -->
<!--        <script src="jquery.min.js"></script>-->
<!--        <script src="js/bootstrap.bundle.min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      

    </body>
    </html>
<?php else:
    header("Location: index.php");
    die(); ?>
<?php endif; ?> 
