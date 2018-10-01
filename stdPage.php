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
