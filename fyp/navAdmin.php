<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Cashless Canteen</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="adduser.php">Add User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">View User</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#">Add Credit</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#">View Foodlist</a>
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