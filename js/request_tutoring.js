function generateRequest(id, name, img, courses) {
   document.getElementById("tutor-id").setAttribute('value', id);
   document.getElementById("tutor-name").innerHTML = name;
   document.getElementById("tutor-img").setAttribute('src', img);
   coursesArr = courses.split(",");
   document.getElementById("tutor-courses").innerHTML = "";
   for (var i = 0; i < coursesArr.length; i++) {
      document.getElementById("tutor-courses").innerHTML += "<option value='" + coursesArr[i] + "'>" + coursesArr[i] + "</option>";
   }
   $('#request-modal').modal('show');
}

$(function() {
   $('#request-form').on('submit', function(e) {
      $('#request-modal').modal('hide');
      e.preventDefault();
      $.ajax({
         url: "request_tutoring.php",
         type: "POST",
         data: $("#request-form").serialize(),
         success: function(data) {
            $('#request-result-content').attr('class', 'modal-content alert alert-info');
            $('#request-result-header').text("Request Sent");
            $('#request-result-body').text("Your tutoring request has been sent.");
            $('#request-result-modal').modal('show');
         },
         error: function(xhr, statusText, err) {
            $('#request-result-content').attr('class', 'modal-content alert alert-danger');
            $('#request-result-header').text("Error: " + xhr.status);
            $('#request-result-body').text("Something went wrong, I'm sorry! Please try again later.");
            $('#request-result-modal').modal('show');
         }
      });
      $('#request-form').trigger('reset');
   });
});
