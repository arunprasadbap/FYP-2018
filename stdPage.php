<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2 ): ?>
    <?php require 'script/bal.php'; 

      $queryString = "SELECT `name` FROM `food_listing` ORDER BY `name`";

      $result = mysqli_query($mysqli,$queryString);

      $arrayNameList = array();

      while($rows = mysqli_fetch_assoc($result)){
          $arrayNameList[] = $rows['name'];
      }  

      $arrayNameString = '"'.implode('","',$arrayNameList).'"';
    ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cashless Canteen</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>
  <style>
    #custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
        width: 100%;
    }
 
    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-input button {
            border: 0;
            padding: 2px 25px;
            margin-top: 0px;
            position: relative;
            left: -2px;
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            color: #ffff;
            background-color: #0062cc;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }

  </style>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>
    
   <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/slideshow.jpg');background-repeat: no-repeat; background-size: cover;">
            <div class="carousel-caption d-none d-md-block">
              <h3>Food Example 1</h3>
              <p>Image Example 1</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slideshow2.jpg');background-repeat: no-repeat; background-size: cover;">
            <div class="carousel-caption d-none d-md-block">
              <h3>Food Example 2</h3>
              <p>Image Example 2</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slideshow3.jpg');background-repeat: no-repeat; background-size: cover;">
            <div class="carousel-caption d-none d-md-block">
              <h3>Food Example 3</h3>
              <p>Image Example 3</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <div class="container">
      <form method="post" action="live_search_result.php">
        <div class="row">
            <div id="custom-search-input">
              <div class="input-group col-md-12">
                <!-- <form method="post" action="#"> -->
                  <input type="text" class="search-query form-control" id="tags" name="tags" placeholder="Search for your food items" />
                  <span class="input-group-btn">
                      <button class="btn btn-primary btn-sm" name="search" value="search" type="submit">
                          Search
                      </button>
                  </span>
                <!-- </form> -->
              </div>
            </div>
        </div>
      </form>
    </div>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Welcome to Swinburne Cafeteria</h1>

      
      <div class="row">
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">Foods</h4>
            <div class="card-body">
              <a href="foodIndex.php"><img class="card-img-top" src="img/food1.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">Drinks</h4>
            <div class="card-body">
              <a href="drinkProduct.php"><img class="card-img-top" src="img/drink1.jpg" alt=""></a>
            </div>
          </div>
        </div>
        </div>
      </div>
  <hr>
    <!-- /.container -->

    <!-- Footer -->
    <?php require 'footer.php'; ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
   <!--  // <script src="jquery/jquery.min.js"></script>
    // <script src="js/bootstrap.bundle.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="script/ajax-call.js"></script>


     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script>
    $( function(){
      var  availableTags = [<?php echo $arrayNameString ?>];
        // var availableTags = [
        //   "ActionScript",
        //   "AppleScript",
        //   "Asp",
        //   "BASIC",
        //   "C",
        //   "C++",
        //   "Clojure",
        //   "COBOL",
        //   "ColdFusion",
        //   "Erlang",
        //   "Fortran",
        //   "Groovy",
        //   "Haskell",
        //   "Java",
        //   "JavaScript",
        //   "Lisp",
        //   "Perl",
        //   "PHP",
        //   "Python",
        //   "Ruby",
        //   "Scala",
        //   "Scheme"
        // ];
        
        $( "#tags" ).autocomplete({
          source: availableTags
        });
  });
  </script

  </body>

</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 