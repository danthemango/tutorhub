<?php
/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  To serve the search results from the Tutorhub databas
 * Created:  2018-03-09 By Dan
 * Modified: 2018-03-14 Angelo - Incorporated tutoring request code
 * Modified: 2018-03-15 Dan - Fetching results from database
 */
$pagetitle = "Search";
require_once 'inc/header.php';

require_once("inc/dbinfo.inc");
try{
   $dbh = new PDO("mysql:host=$host;dbname=$user", $user, $password);
   // get the number of results requested (default: 8)
   $resultsPerPage = isset($_GET['resultsPerPage']) ? $_GET['resultsPerPage'] : 8;
   // the current page requested (default: 0)
   $pageNum = isset($_GET['page']) ? $_GET['page'] : 0;
   // number of search results returned
   $totalResults = ($dbh->query('select count(*) from profiles'))->fetchColumn();
   // get the number of results actually displayed on page
   $resultsOnPage = min($resultsPerPage, $totalResults);

?>
<section class="container-fluid main h-100">
   <div class="row">
      <div class="col-12">
         <h1 class="mt-3"> Search Results </h1>
         <p><a href="./">&lt; Back to Search </a></p>
      </div>
   </div>

<?php

   // get profiles
   $results = $dbh->query(
      'select id, firstname, lastname, phone, avatar from profiles where type = "tutor" limit '.$pageNum*$resultsPerPage.','.$resultsPerPage
   );
   foreach($results as $row):

?>
   <div class="row">
      <div class="col-sm-6 col-lg-3">
         <div class="card" style="width: 18rem;">
         <img class="card-img-top" src="img/profile/<?=$row["avatar"]?>" alt="<?=$row["firstname"].' '.$row["lastname"].'\'s profile picture'?>">
            <div class="card-body">
            <h5 class="card-title"><?=$row["firstname"].' '.$row["lastname"]?></h5>
               <row>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scheduleModal">
                     Check Schedule
                  </button>
               </row>
               <row>
                  <button type="button" class="btn btn-primary mt-1" onclick="generateRequest(<?="'{$row["id"]}','{$row["firstname"]} {$row["lastname"]}','img/profile/{$row["avatar"]}','MATH 100')"?>">
                     Request Tutoring
                  </button>
               </row>
            </div>
         </div>
      </div>
   </div>

<?php
   endforeach;
?>

   <div class="row">
      <div class="col-12">
         <p>Showing <?=$resultsOnPage?> results of <?=$totalResults?></p>
      </div>
   </div>
   <div class="row">
     <div class="col-12">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#">&laquo;</a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">5</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">&raquo;</a>
          </li>
        </ul>
     </div>
</section>

<!-- schedule modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="scheduleModalLabel">Neptunny's Availabilities</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="schedule"></div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<script>
   // put schedule information in the modal only once bootstrap constructs it
   // (which is after the user clicks to request it)
   $('#scheduleModal').on('shown.bs.modal',function(e){
      $(function () {
         $("#schedule").jqs({
            mode: "read",
            days: ["Mo","Tu","We","Th","Fr","Sa","Su"],
            hour: 12,
            data: [{
               day: 0,
               periods: [
                  ["00:00", "02:00"],
                  ["03:00", "06:00"],
                  ["06:00", "07:00"],
                  ["08:00", "09:00"],
                  ["8pm","12am"],
               ]
            }, {
               day: 3,
               periods: [
                  ["00:00", "08:30"],
                  ["09:00", "12pm"],
               ]
            }]
         });
      });
   });
</script>

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

<?php 
   
}catch(PDOException $e){
   echo "Error: " . $e->getMessage() . "<br />";
}

require_once 'inc/footer.php'; 

?>
