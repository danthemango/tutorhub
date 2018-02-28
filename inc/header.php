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
      <link rel="stylesheet" href="/~guenthdd/tutorhub/css/main.css">
      <script src="/~guenthdd/tutorhub/res/jquery-3.3.1.min.js" ></script>
      <script src="/~guenthdd/tutorhub/res/popper.min.js" ></script>
      <script src="/~guenthdd/tutorhub/res/bootstrap.min.js" ></script>
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
