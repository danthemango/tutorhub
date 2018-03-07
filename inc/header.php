<!-- start header.php -->
<!DOCTYPE html>

<?php
   // grab the page name if available
   $sitetitle = "TutorHub";
   if(isset($pagetitle)){
      $sitetitle = $sitetitle . " | $pagetitle";
   }

   // used to disambiguate between sites (e.g. for docker container images)
   if(file_exists("inc/.siteurl")){
      $sfh = fopen("inc/.siteurl","r");
      $siteurl = fread($sfh, filesize("inc/.siteurl")-1);
   }else{
      $siteurl = "/~guenthdd/tutorhub";
   }
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $sitetitle ?></title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?= $siteurl ?>/res/bootstrap.min.css">
      <!-- Optional CSS -->
      <link rel="stylesheet" href="<?= $siteurl ?>/css/main.css">
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
