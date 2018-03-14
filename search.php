<?php
$pagetitle = "Search";
require 'inc/header.php';
?>
<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  To serve the search results from the Tutorhub databas
   Created:  2018-03-09 By Dan
   Modified: 2018-03-09 Dan: created sample search results
   TODO: pull information from the database
-->

<section id="main" class="mx-3">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <h1> Search Results </h1>
            <p class="lead">Showing 4 results of 200</p>
            <p><a href="./">&lt; Back to Search </a></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6 col-lg-3">
            <div class="card" style="width: 18rem;">
               <img class="card-img-top" src="img/profile/card_neptune.jpg" alt="statue of the god, neptune">
               <div class="card-body">
                  <h5 class="card-title">Neptunny</h5>
                  <p class="card-text">Neptunny will do anything you need, as long as you need it done under water.</p>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#neptunnyModal">
                     Check Schedule
                  </button>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-3">
            <div class="card" style="width: 18rem;">
               <img class="card-img-top" src="img/profile/card_thai_statue.jpg" alt="a smiling face statue in thailand">
               <div class="card-body">
                  <h5 class="card-title">Your Buddhy</h5>
                  <p class="card-text">If you need a smile then Buddhy's your guy.</p>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buddhyModal">
                     Check Schedule
                  </button>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-3">
            <div class="card" style="width: 18rem;">
               <img class="card-img-top" src="img/profile/card_palm_tree.jpg" alt="palm trees in the wind">
               <div class="card-body">
                  <h5 class="card-title">Some Palm Trees</h5>
                  <p class="card-text">These trees will palm the shoes off your feet.</p>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#palmyModal">
                     Check Schedule
                  </button>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-3">
            <div class="card" style="width: 18rem;">
               <img class="card-img-top" src="img/profile/card_snowydan.jpg" alt="a man in snowy weather">
               <div class="card-body">
                  <h5 class="card-title">Snowydan</h5>
                  <p class="card-text">Exactly like Sunnidan except 20% more efficient.</p>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#snowydanModal">
                     Check Schedule
                  </button>
               </div>
            </div>
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
      </div>
   </div>
</section>

<!-- neptunny's modal -->
<div class="modal fade" id="neptunnyModal" tabindex="-1" role="dialog" aria-labelledby="neptunnyModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="neptunnyModalLabel">Neptunny's Availabilities</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="neptunnySchedule"></div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- buddhy's modal -->
<div class="modal fade" id="buddhyModal" tabindex="-1" role="dialog" aria-labelledby="buddhyModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="buddhyModalLabel">Buddhy's Availabilities</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="buddhySchedule"></div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- palmy's modal -->
<div class="modal fade" id="palmyModal" tabindex="-1" role="dialog" aria-labelledby="palmyModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="palmyModalLabel">Palmy's Availabilities</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="palmySchedule"></div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- snowydan's modal -->
<div class="modal fade" id="snowydanModal" tabindex="-1" role="dialog" aria-labelledby="snowydanModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="snowydanModalLabel">Snowydan's Availabilities</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="snowydanSchedule" class="jqs-demo mb-3"></div>
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
   $('#neptunnyModal').on('shown.bs.modal',function(e){
      $(function () {
         $("#neptunnySchedule").jqs({
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
   $('#buddhyModal').on('shown.bs.modal',function(e){
      $(function () {
         $("#buddhySchedule").jqs({
            mode: "read",
            days: ["Mo","Tu","We","Th","Fr","Sa","Su"],
            hour: 12,
            data: [{
               day: 0,
               periods: [
                  ["5pm","10pm"],
               ]
            }, {
               day: 1,
               periods: [
                  ["5pm","10pm"],
               ]
            }, {
               day: 2,
               periods: [
                  ["5pm","10pm"],
               ]
            }, {
               "day":3,
               "periods":[
                  {
                     "start":"00:00",
                     "end":"07:00",
                     "title":"Bath Time",
                     "backgroundColor":"rgba(255, 0, 0, 0.5)",
                     "borderColor":"rgb(42, 60, 255)",
                     "textColor":"rgb(0, 0, 0)",
                  }, {
                     "start":"10:00",
                     "end":"11:00",
                     "title":"",
                     "backgroundColor":"rgba(82, 155, 255, 0.5)",
                     "borderColor":"rgb(42, 60, 255)",
                     "textColor":"rgb(0, 0, 0)",
                  },
               ]
            }, {
               day: 5,
               periods: [
                  ["6am","6pm"],
               ]
            }, {
               day: 6,
               periods: [
                  ["6am","6pm"],
               ]
            }]
         });
      });
   });
   $('#palmyModal').on('shown.bs.modal',function(e){
      $(function () {
         $("#palmySchedule").jqs({
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
   $('#snowydanModal').on('shown.bs.modal',function(e){
      $(function () {
         $("#snowydanSchedule").jqs({
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

<?php require 'inc/footer.php'; ?>
