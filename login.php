<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  Login page for TutorHub
   Created:  2018-03-06 by Angelo
   Modified: 2018-03-07 by Angelo
-->
<?php

$pagetitle = "Tutor Login";
require 'inc/header.php';

?>

<section class="container-fluid main h-100 with-background">
   <div class="row h-100 justify-content-center align-items-center">
      <div class="col-lg-4 col-md-8 col-xxs-12">
         <form class="form-whitebox">
            <h4 class="text-center">Tutor Sign In</h4>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-check">
               <input type="checkbox" class="form-check-input" id="remember" name="remember">
               <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <br>
            <div class="text-center mt-3">
               <button type="submit" class="btn btn-primary" name="submit">Log In</button>
            </div>
         </form>
      </div>
   </div>
</section>

<?php require 'inc/footer.php'; ?>
