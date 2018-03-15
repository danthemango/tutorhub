<?php
$pagetitle = "Search";
require 'inc/header.php';
?>
<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  To serve the search results from the Tutorhub databas
   Created:  2018-03-09 By Dan
   Modified: 2018-03-14 Angelo - Incorporated tutoring request code
   TODO: pull information from the database
-->
<section class="container-fluid main h-100">
   <div class="row">
      <div class="col-12">
         <h1 class="mt-3"> Search Results </h1>
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
               <row>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#neptunnyModal">
                     Check Schedule
                  </button>
               </row>
               <row>
                  <button type="button" class="btn btn-primary mt-1" onclick="generateRequest('1111', 'Neptunny', 'img/profile/card_neptune.jpg', 'MATH 100,CSCI 260,CSCI 310,CSCI 320,CSCI 485,CSCI 123')">
                     Request Tutoring
                  </button>
               </row>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-lg-3">
         <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="img/profile/card_thai_statue.jpg" alt="a smiling face statue in thailand">
            <div class="card-body">
               <h5 class="card-title">Your Buddhy</h5>
               <p class="card-text">If you need a smile then Buddhy's your guy.</p>
               <row>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buddhyModal">
                     Check Schedule
                  </button>
               </row>
               <row>
                  <button type="button" class="btn btn-primary mt-1" onclick="generateRequest('2222', 'Your Buddhy', 'img/profile/card_thai_statue.jpg', 'MATH 100,CSCI 260,CSCI 310,CSCI 320,CSCI 485,CSCI 123')">
                     Request Tutoring
                  </button>
               </row>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-lg-3">
         <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="img/profile/card_palm_tree.jpg" alt="palm trees in the wind">
            <div class="card-body">
               <h5 class="card-title">Some Palm Trees</h5>
               <p class="card-text">These trees will palm the shoes off your feet.</p>
               <row>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#palmyModal">
                     Check Schedule
                  </button>
               </row>
               <row>
                  <button type="button" class="btn btn-primary mt-1" onclick="generateRequest('3333', 'Some Palm Trees', 'img/profile/card_palm_tree.jpg', 'MATH 100,CSCI 260,CSCI 310,CSCI 320,CSCI 485,CSCI 123')">
                     Request Tutoring
                  </button>
               </row>

            </div>
         </div>
      </div>
      <div class="col-sm-6 col-lg-3">
         <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="img/profile/card_snowydan.jpg" alt="a man in snowy weather">
            <div class="card-body">
               <h5 class="card-title">Snowydan</h5>
               <p class="card-text">Exactly like Sunnidan except 20% more efficient.</p>
               <row>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#snowydanModal">
                     Check Schedule
                  </button>
               </row>
               <row>
                  <button type="button" class="btn btn-primary mt-1" onclick="generateRequest('4444', 'Snowydan', 'img/profile/card_snowydan.jpg', 'MATH 100,CSCI 260,CSCI 310,CSCI 320,CSCI 485,CSCI 123')">
                     Request Tutoring
                  </button>
               </row>

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
                  <select id="tutor-courses"  multiple class="col-9 form-control" name="courses[]" required>

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
                  <input type="submit" class="btn btn-primary" value="Send Request">
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
