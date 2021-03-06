<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="admin.php">Cashless Canteen</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add User
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="adduser.php">Add Student/Staff</a>
                <a class="dropdown-item" href="adduser1.php">Add Canteen Staff</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewuser.php">View User</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="addamount.php">Add Credit</a>
            </li>
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">View Foodlist</a>
			  <div class="dropdown-menu"><a class="dropdown-item" href="scrmenu.php">SCR</a>
				<a class="dropdown-item" href="laksa.php">LAKSA</a>
				<a class="dropdown-item" href="pizza.php">PIZZA</a>
				<a class="dropdown-item" href="indian.php">INDIAN</a></div>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#">View Report</a>
            </li>
            <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
             <li class="nav-item">
              <a class="nav-link" href="#">Hello, <?php echo  $_SESSION['username']; ?>!</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="script/logout.php">Logout</a>
            </li>
            <?php endif; ?> 
          </ul>
        </div>
      </div>
    </nav>