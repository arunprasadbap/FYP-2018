

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="scrStaff.php">Cashless Canteen</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          
              <li class="nav-item">
                    <a class="nav-link" href="scrDelivered.php">Delivered Orders</a>
                </li>
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add Food
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="addBfastSCR.php">Add Breakfast</a>
                <a class="dropdown-item" href="addLunchSCR.php">Add Lunch</a>
                <a class="dropdown-item" href="addDrinkSCR.php">Add Drink</a>
              </div>
            </li>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                View Food
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="bfastProduct1.php">View Breakfast</a>
                <a class="dropdown-item" href="lunchProduct1.php">View Lunch</a>
                <a class="dropdown-item" href="drinkProduct1.php">View Drink</a>
              </div>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Edit Quantity
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="editFood.php">Edit Breakfast Quantity</a>
                <a class="dropdown-item" href="editFood2.php">Edit Lunch Quantity</a>
              </div>
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