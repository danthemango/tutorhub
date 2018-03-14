<!DOCTYPE html>
<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  Login page for TutorHub
   Created:  2018-03-07 by Angelo
   Modified: 2018-03-13 by Angelo
-->
<?php 

$pagetitle = "Request Tutoring";
require 'inc/header.php';

?>

<div class="container-fluid h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <button type="button" class="btn btn-primary" onclick="generateRequest('1234', 'Angelo Ng', 'img/avatar.png', 'MATH 100,CSCI 260,CSCI310,CSCI 320,CSCI 485,CSCI 123')">
         Request Tutoring
      </button>
   </div>
</div>

<!-- Request Tutoring Modal -->
<div id="request-modal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="col modal-title text-center">Request Tutoring</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <div class="modal-body">
            <form id="request-form">
               <input id="tutor-id" type="hidden" name="id">
               <div class="row form-group pr-3">
                  <div class="col-3 col-form-label text-center" for="courses">
                     <row><img id="tutor-img" class="img-fluid"></row>
                     <row id="tutor-name" class="font-weight-bold"></row>
                  </div>                     
                  <select id="tutor-courses"  multiple class="col-9 form-control"name="courses" required>

                  </select>
               </div>
               <div class="row form-group pr-3">
                  <label class="col-3 col-form-label" for="name">Name</label>
                  <input type="text" class="col-9 form-control" id="name" name="name" required>
               </div>
               <div class="row form-group pr-3">
                  <label class="col-3 col-form-label" for="email">Email</label>
                  <input type="email" class="col-9 form-control" id="email" name="email" required>
               </div>
               <div class="row form-group pr-3">
                  <label class="col-3 col-form-label" for="phone">Mobile</label>
                  <input type="tel" class="col-9 form-control" id="phone" name="phone" required>
               </div>
               <div class="form-group">
                  <textarea class="form-control" id="message" name="message" rows="3" placeholder="Specify your desired days and times for tutoring, along with any other relevant information" required></textarea>
               </div>
               <div class="text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="Send Request">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Request Tutoring Confirmation Modal -->
<div id="request-result-modal" class="modal fade">
   <div class="modal-dialog modal-dialog-centered">
      <div id="request-result-content" class="modal-content">
         <div class="modal-header">
            <div id="request-result-header"></div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body" id="request-result-body">
         </div>
      </div>
   </div>
</div>

<script src="js/request_tutoring.js"></script>

<?php require 'inc/footer.php'; ?>
