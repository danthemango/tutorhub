/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  Used for loading javascript features on the search.php page
 * Created:  2018-03-31 By Dan
 * Created:  2018-04-01 By Dan, fixed loading of JSON string
 * Modified: -
 */

// run this only after page load
$(document).ready(function(){
   // once the user clicks on a button we want to specify which schedule to draw
   $('button[data-userid]').on('click',function(){
      // change the title of the modal
      $('#scheduleModal .modal-title').text("Availabilities for "+$(this).data('firstname')+' '+$(this).data('lastname'));
      // put the schedule information in the modal
      $('#scheduleModal').data('schedule',$(this).data('schedule'));
   });

   // draw the schedule once the modal actually shows up
   $('#scheduleModal').on('shown.bs.modal',function(){
      if($('#schedule').length < 1){
         $('#scheduleModal .modal-body').append('<div id=\'schedule\'></div>');
         $('#schedule').jqs({
            mode: "read",
            // shortens the name displayed on the week list (e.g. Mo instead of Monday)
            days: ["Mo","Tu","We","Th","Fr","Sa","Su"],
            hour: 24,
         });
      }
      $('#schedule').jqs('reset');
      $('#schedule').jqs('import',$(this).data('schedule'));
   });
});
