<!DOCTYPE html>
<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  Login page for TutorHub
   Created:  2018-03-06 by Angelo
   Modified: 2018-03-06 by Angelo
-->
<?php 

$pagetitle = "Tutor Login";
require 'inc/header.php';

?>

<div class="row h-100 justify-content-center align-items-center">
   <div class="col-lg-4 col-md-8 col-xxs-12">
      <form style="padding: 5%;background: white">
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
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
         <div class="text-center">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
         </div>
      </form>
   </div>
</div>

<?php require 'inc/footer.php'; ?>
