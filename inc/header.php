<?php
  session_start();
?>
<!-- start header.php -->
<!DOCTYPE html>
<?php

  $session = false;
  if (isset($_SESSION['UserData']['Username'])) {
    $session_user = $_SESSION['UserData']['Username'];
    $session_avatar = $_SESSION['UserData']['Avatar'];
    $session = true;
  }

   // grab the page name if available
   $sitetitle = "TutorHub";
   if(isset($pagetitle)){
      $sitetitle = $sitetitle . " | $pagetitle";
   }
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $sitetitle ?></title>
      <link rel="stylesheet" href="res/bootstrap.min.css">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="res/jquery-ui.min.css">
      <link rel="stylesheet" href="res/jquery-schedule/dist/jquery.schedule.css">
      <script src="res/jquery-3.3.1.min.js" ></script>
      <script src="res/popper.min.js" ></script>
      <script src="res/bootstrap.min.js" ></script>
      <script src="res/jquery-ui.min.js"></script>
      <script src="res/jquery-schedule/dist/jquery.schedule.js"></script>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-expand-sm navbar-dark bg-primary fixed-top">
           <a class="navbar-brand" href="./index.php">TutorHub</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarColor01">
             <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

<?php

if ($session) {
  echo "
    <li>
      <img src='img/profile/" . $session_avatar . "' class='avatar img-responsive' alt='Tutor Avatar'>
      <span class='header-username text-info'>" . $session_user . "</span>
    </li>
  ";
  echo "<li><a class='nav-link' href='logout.php'>Logout</a></li>";
} else {
  echo "<li><a class='nav-link' href='signup.php'><span class='glyphicon glyphicon-user'></span> Become a Tutor</a></li>";
  echo "<li><a class='nav-link' href='login.php'><span class='glyphicon glyphicon-log-in'></span> Tutor Sign In</a></li>";
}

?>
  
             </ul>
           </div>
         </nav>
      </header>
<!-- end header.php -->
