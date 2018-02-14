<!DOCTYPE html>
<!--
   Group:   SCAD (Sami, Camille, Angelo, and Dan)
   Purpose: example landing page for TutorHub
   Created: 2018-02-06 by Dan
   Modified: 2018-02-13 Dan: developed sample page with bootstrap
-->
<?php 

$pagetitle = "Welcome";
require 'inc/header.php'; 

?>

   <section id="main">
      <div class="jumbotron">
        <h1 class="display-3">Welcome</h1>
        <p class="lead">TutorHub is simple tutor finding service. Want some help in a class you're taking now? See if anyone is available:</p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Find a Tutor</a>
      </div>

<?php require 'inc/footer.php'; ?>

