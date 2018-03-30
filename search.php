<?php
/*
 * Group:     SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:   To serve the search results from the Tutorhub database
 * Created:   2018-03-09 By Dan
 * Modified:  2018-03-14 Angelo - Incorporated tutoring request code
 * Modified:  2018-03-15 Dan - Fetching results from database
 * Modified:  2018-03-27 Dan - Dynamically setting times in modal by account
 * Modified:  2018-03-28 Dan - Dynamically setting times in modal by account
 * Sources:   - http://php.net/manual/en/function.strtotime.php
 *            - http://php.net/manual/en/pdostatement.bindparam.php
 *            - http://php.net/manual/en/function.gettype.php
 *            - https://developer.mozilla.org/en-US/docs/Learn/HTML/Howto/Use_data_attributes
 */

$pagetitle = "Search";
require_once 'inc/header.php';
$err = "";
require_once('inc/statements.php');

try{
   // get the number of results requested (default: 8)
   $resultsPerPage = isset($_GET['resultsPerPage']) ? $_GET['resultsPerPage'] : 8;
   // the current page requested (default: 0)
   $pageNum = isset($_GET['page']) ? $_GET['page'] : 0;
   // ensure pageNum is a non-negative number
   $pageNum = $pageNum >= 0 ? $pageNum : -$pageNum;
   // number of results of user's search
   $totalResults = getTotalResults(); // TODO use query
   // number of results we will actually see on this page
   $resultsOnPage = min($resultsPerPage, $totalResults);

   // validate user request
   $err = null;

   // TODO remove
   // echo "<h2>I received</h2>";
   // echo "<pre>";
   // print_r($_POST);
   // echo "</pre>";
?>

<section class="container-fluid main h-100">

   <div class="row">
      <div class="col-12">
         <h1 class="mt-3"> Search Results </h1>
         <p><a href="./">&lt; Back to Search </a></p>
      </div>
   </div>
   <div class="row">

<?php

   // get profiles with relevant information from the database
   $startPos = $pageNum*$resultsPerPage;
   $profiles = getProfiles($startPos,$resultsOnPage);
   putTimesInProfiles($profiles);

   // TODO remove
   // echo "I RECEIVED: ";
   // print_r($profiles);

   foreach($profiles as $profile):
?>
      <div class="col-sm-6 col-lg-3">
         <div class="card" style="width: 18rem;">
         <img class="card-img-top" src="img/profile/<?=$profile["avatar"]?>" alt="<?=$profile['firstname'].' '.$profile['lastname'].'\'s profile picture'?>">
            <div class="card-body">
            <h5 class="card-title"><?=$profile['firstname'].' '.$profile['lastname']?></h5>
               <row>
               <button type="button" class="btn btn-primary schedButton" data-userid="<?=$profile['id']?>" data-toggle="modal" data-target="#scheduleModal">
                     Check Schedule
                  </button>
               </row>
               <row>

                  <button type="button" class="btn btn-primary mt-1 " onclick="generateRequest(<?="'{$profile["id"]}','{$profile["firstname"]} {$profile["lastname"]}','img/profile/{$profile["avatar"]}','{$profile["courses"]}')"?>">
                     Request Tutoring
                  </button>
               </row>
            </div>
         </div>
      </div>

<?php
   endforeach;
?>
   </div>
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
            <h5 class="modal-title" id="scheduleModalLabel">Availabilities</h5>
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
   $(document).ready(function(){
      // will hold the function needed to draw the schedules on the modal
      var scheduleModalDrawerFunc = function(){};

      // create an object to hold schedules for each user, using user id as key
      var scheduleModalDrawerFuncs = {
<?php
   foreach($profiles as $profile):
?>
         '<?=$profile['id']?>': function () {
            // change the title of the modal
            $('.modal-title').text("Availabilities for <?=$profile['firstname'] . " " . $profile['lastname']?>");
            // set the schedule of the modal in a child
            $('#schedule').append('<div id=\'scheduleChild\'></div>');
            $('#scheduleChild').jqs({
            mode: "read",
               // shortens the name displayed on the week list (e.g. Mo instead of Monday)
               days: ["Mo","Tu","We","Th","Fr","Sa","Su"],
               hour: 24,
               data: [

<?php
      // put the availabilities in the JSON on the page
      foreach($profile['times'] as $day => $availabilities){
         echo "{\n";
         echo "   day: $day,\n";
         echo "   periods: [\n";
         foreach($availabilities as $availability){
            echo "[\"".$availability['starttime']."\", \"".$availability['endtime']."\"],\n";
         }
         echo "   ]\n";
         echo "},\n";
      }
?>

               ]
            });
         },
<?php
   endforeach;
?>
      };

      // once the user clicks on a button we want to specify which schedule to draw
      $('button[data-userid]').on('click',function(){
         console.log("you wanted the schedule of " + this.dataset.userid);
         console.log(scheduleModalDrawerFuncs[this.dataset.userid]);
         // TODO ensure userid is a valid number
         scheduleModalDrawerFunc = scheduleModalDrawerFuncs[this.dataset.userid];
      });

      // draw the schedule once the user requests it
      $('#scheduleModal').on('shown.bs.modal',function(){
         console.log('I am shown');
         $(scheduleModalDrawerFunc);
      });

      // take the scheduleChild away after the user leaves modal (to force it to draw a different
      //    next time)
      $('#scheduleModal').on('hidden.bs.modal',function(){
         console.log('I am hidden');
         $('#schedule').html('');
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

<?php
}catch(PDOException $e){
      $err .= "<p style=\"color:red\">Error in pulling information from database, please contact your web administrator.</p>";
}

require_once 'inc/footer.php';

?>
