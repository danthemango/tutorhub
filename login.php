<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  Login page for TutorHub
   Created:  2018-03-06 by Angelo
   Modified: 2018-03-07 by Angelo
-->
<?php

$pagetitle = "Tutor Login";
require_once("inc/auth.php");
require_once("inc/header.php");

$login_error = false;
if ($session) {
   header("location:index.php");
} else if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
   $info = attemptLogin($email, $password);

   if ($info) {
      $_SESSION['UserData']['Username'] = htmlspecialchars($info[0]);
      $_SESSION['UserData']['Avatar'] = htmlspecialchars($info[1]);
      header("location:index.php");
   } else {
      $login_error = true;
   }
}

if ($login_error) {
   echo "
      <div id='login-error-modal' class='modal fade'>
         <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content alert alert-danger'>
               <div class='modal-header'>
                  <div>Login Failed</div>
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
               </div>
               <div class='modal-body'>
                  Invalid login credentials. Please try again.
               </div>
            </div>
         </div>
      </div>
   ";
   echo "<script>$('#login-error-modal').modal('show');</script>";
}

?>

<section class="container-fluid main h-100 with-background">
   <div class="row h-100 justify-content-center align-items-center">
      <div class="col-lg-4 col-md-8 col-xxs-12">
         <form class="form-whitebox" method="post">
            <h4 class="text-center">Tutor Sign In</h4>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <br>
            <div class="text-center mt-3">
               <button type="submit" class="btn btn-primary" name="submit">Log In</button>
            </div>
         </form>
      </div>
   </div>
</section>

<?php require 'inc/footer.php'; ?>
