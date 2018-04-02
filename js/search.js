/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  Used for loading javascript features on the search.php page
 * Created:  2018-03-31 By Dan
 * Created:  2018-04-01 By Dan, fixed loading of JSON string
 * Modified: -
 */


// returns jquery schedule object to be drawn, given date data
function getJqs(data){
   var result = {
      mode: "read",
      // shortens the name displayed on the week list (e.g. Mo instead of Monday)
      days: ["Mo","Tu","We","Th","Fr","Sa","Su"],
      hour: 24,
      data: data,
   };
   return result;
}

// run this only after page load
$(document).ready(function(){
   // once the user clicks on a button we want to specify which schedule to draw
   $('button[data-userid]').on('click',function(){
      // tell the scheduleModal which user we want to display
      $('#scheduleModal').data('userid',$(this).data('userid'));
      $('#scheduleModal').data('firstname',$(this).data('firstname'));
      $('#scheduleModal').data('lastname',$(this).data('lastname'));
      $('#scheduleModal').data('schedule',$(this).data('schedule'));
   });

   // draw the schedule once the user requests it
   $('#scheduleModal').on('shown.bs.modal',function(){
      // change the title of the page
      $('#scheduleModal .modal-title').text("Availabilities for "+$(this).data('firstname')+' '+$(this).data('lastname'));
      // set the schedule of the modal in a child
      $('#scheduleModal .modal-body').append('<div id=\'schedule\'></div>');
      $('#schedule').jqs(getJqs($(this).data('schedule')));
   });

   // take the scheduleChild away after the user leaves modal 
   // (to force it to draw a different one next time)
   $('#scheduleModal').on('hidden.bs.modal',function(){
      // delete the schedule from the modal
      $('#scheduleModal .modal-body').html('');
   });
});

