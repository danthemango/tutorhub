<!DOCTYPE html>
<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  Login page for TutorHub
   Created:  2018-03-07 by Angelo
   Modified: 2018-03-07 by Angelo
-->
<?php 

$pagetitle = "Request Tutoring";
require 'inc/header.php';

?>

<div class="row h-100 justify-content-center align-items-center">
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#requestTutoring">
      Request Tutoring
   </button>
</div>

<!-- The Modal -->
<div class="modal fade" id="requestTutoring">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="col modal-title text-center">Request Tutoring</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
         <form>
            <div class="row form-group pr-3">
               <div class="col-3 col-form-label text-center" for="courses">
                  <row><img class="img-fluid" src="img/avatar.png"></row>
                  <row class="font-weight-bold">Angelo Ng</row>
               </div>                     
               <select multiple class="col-9 form-control" id="courses" name="courses">
                  <option>CSCI 100</option>
                  <option>CSCI 260</option>
                  <option>CSCI 310</option>
                  <option>CSCI 320</option>
                  <option>CSCI 485</option>
                  <option>MATH 123</option>
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
               <textarea class="form-control" id="message" rows="3" placeholder="Specify your desired days and times for tutoring, along with any other relevant information" required></textarea>
            </div>
            <div class="text-center mt-3">
               <button type="submit" class="btn btn-primary" name="submit">Send Request</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>


<?php require 'inc/footer.php'; ?>
