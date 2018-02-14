<!-- start header.php -->
<!DOCTYPE html>

<?php
   // grab the page name if available
   $sitetitle = "TutorHub";
   if(isset($pagetitle)){
      $sitetitle = $sitetitle . " | $pagetitle";
   }
?>

<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title><?= $sitetitle ?></title>
      <link rel="stylesheet" href="/~guenthdd/tutorhub/res/bootstrap.min.css">
      <link rel="stylesheet" href="/~guenthdd/tutorhub/res/main.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="/~guenthdd/tutorhub/res/bootstrap.min.js"></script>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
           <a class="navbar-brand" href="#">TutorHub</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarColor01">
             <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="#">Find Tutor</a>
               </li>
             </ul>
             <ul class="nav navbar-nav navbar-right">
               <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-user"></span> Become a Tutor</a></li>
               <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-log-in"></span> Tutor Sign In</a></li>
             </ul>
           </div>
         </nav>
      </header>
<!-- end header.php -->
