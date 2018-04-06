<!DOCTYPE html>
<!--
   Group:   SCAD (Sami, Camille, Angelo, and Dan)
   Purpose: landing page for TutorHub Sign up
   Created: 2018-02-06 by Dan
   Modified:2018-02-13 Dan: developed sample page with bootstrap
			2018-02-20 Camille: made a copy and minor changes 
      2018-03-10 Camille: made major page edits- added personal info section
      2018-03-12 Camille: added course selection and tried implementing collapsible schedules
      2018-03-14 Camille: completed scheduling section & rest of file edits
      2018-03-26 Camille: added hourly rate, fixed layout issues and padding, changed hourly inputs
      2019-04-03 Camille: edited background photo dimensions
-->

<!-- Page-Specific CSS written by CJ -->
<style>
  .myForm, h2, h3, button {
    text-align: center;
    font-weight: bold;  
    font-size: 140%;
  }

  h2 {
    margin-top:10px;
    color: white;
  }

  ul li {
    display: inline;
  }

  .description {
    display:block;
    font-weight: 100;
    font-size:75%;
  }

  .container {
    padding: 10px;
  }

  .weekdays {
    font-size: 80%;
    padding-bottom: 2%;
  }

  /* for hourly availability */
  .timeSlots {
    background-color: #1E90FF;
    padding: 5px;
    border-radius: 10px;
    color: white;
    font-size: 80%;
  }

  .timeSlots:hover {
    background-color: #4682B4;
  }

  .jumbotron {
    padding: 20px;
  }

  .myHeader {
    background-color: #efeff2;
    padding: 20px 0px;
    border-radius: 10px;
  }

  .personalInfo {
    font-weight: bold;

  }

  .textLabels {
    background-color: rgba(239, 239, 242, 0.45);
    border-radius: 2px;
    padding: 0px 65px;
    /*text-shadow: 1px 1px 1px rgb(239, 239, 242); */

  }

  .textEmailLabel {
    background-color: rgba(239, 239, 242, 0.45);
    border-radius: 2px;
    padding: 0px 35px;

  }

 .textPhoneLabel {
    background-color: rgba(239, 239, 242, 0.45);
    border-radius: 2px;
    padding: 0px 50px;

  }

 .textRateLabel {
    background-color: rgba(239, 239, 242, 0.45);
    border-radius: 2px;
    padding: 0px 58px;

  }
  
  .add-background {
	 background-image: url("img/background.jpg");
	 background-position: center;
    background-repeat: no-repeat;
    background-size: 100% 62%;
}


</style>

<?php 

$pagetitle = "Sign up";
require 'inc/header.php'; 
//require 'inc/validate.php';

if ($session) {
   header("location:index.php");
}

?>
		<section class="main h-100 container-fluid with-overflow add-background">
		   <div class="myHeader container-fluid">
		      <h1 class="display-4">Sign up now!</h1>
		   </div>


	  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Personal info ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	  <h2> Profile Creation </h2>
	  <h3> Personal Information </h3>
	  <form action="submitSignup.php" method='post' class='myForm'>
		   <div class='personalInfo'>
		       <span class='textLabels'>First name:</span><br>
		       <input type="text" name="firstname">
		       <br>
		       <span class='textLabels'>Last name:</span><br>
		       <input type="text" name="lastname">
		       <br>
		       <span class='textEmailLabel'>Email (username)</span><br>
		       <input type="email" name="email">
		       <br>
		       <span class='textLabels'>Password:</span><br>
		       <input type="password" name="password">
		       <br>
		       <span class='textPhoneLabel'>Phone number:</span><br>
		       <input type="text" name="phone">
		       <br>
		       <span class='textRateLabel'>Hourly rate:</span><br>
		       $ <input type="number" name="rate">
		       <br><br>
		 </div> <!-- end personalInfo --> 
  <hr>
  
  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Course selection ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <h2> Courses </h2>
  <h3> I am interested in tutoring in the following courses: </h3> <br>

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ First year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> First year: </h4></div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI160"> 
          CSCI160 <br> <small> Computing Science I </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI161"> 
          CSCI161 <br> <small> Computing Science II </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI162"> 
          CSCI162 <br> <small> Topics in Computing Science </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Second year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> Second year: </h4></div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI260"> 
          CSCI260 <br> <small> Data Structures and Algorithms </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI261"> 
          CSCI261 <br> <small> Computer Architecture and Assembly Language </small>
      </div>
        <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI265"> 
          CSCI265 <br> <small> Software Engineering </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Third year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> Third year: </h4></div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI310"> 
          CSCI310 <br> <small> Introduction to Human-Computer Interaction </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI311"> 
          CSCI311 <br> <small> Web Programming </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI320"> 
          CSCI320 <br> <small> Foundations of Computer Science </small>
      </div>

    </div> <!-- close row -->
 
  </div> <!-- end container -->

 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ More third year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> </div>
        <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI330"> 
          CSCI330 <br> <small> Programming Languages </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI355"> 
          CSCI355 <br> <small> Digital Logic and Computer Organization </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI370"> 
          CSCI370 <br> <small> Database Systems </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Fourth year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> Fourth year: </h4></div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI400"> 
          CSCI400 <br> <small> Computers and Society </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI460"> 
          CSCI460 <br> <small> Networks and Communications </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="classes[]" value="CSCI485"> 
          CSCI485 <br> <small> Topics in Systems </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->

  <hr>

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Scheduling Availability : Monday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


  <h2> Scheduling </h2>
  <h3> Select all time slots you are available to tutor: </h3> <br>


  <div class='container-fluid weekdays'>
    <div class="row justify-content-center align-items-center"> 

      <div class="col">   
         Monday
         <div class='container small'> 
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="08:00:00to09:00:00"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="09:00:00to10:00:00"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="10:00:00to11:00:00"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="11:00:00to12:00:00"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="12:00:00to13:00:00"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="13:00:00to14:00:00"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="14:00:00to15:00:00"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="15:00:00to16:00:00"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="16:00:00to17:00:00"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[0][] " value="17:00:00to18:00:00"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info" >
                      <input type="checkbox" name="times[0][] " value="18:00:00to19:00:00"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 1 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <div class="col">   
         Tuesday
         <div class='container small'> 
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="08:00:00to09:00:00"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="09:00:00to10:00:00"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="10:00:00to11:00:00"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="11:00:00to12:00:00"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="12:00:00to13:00:00"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="13:00:00to14:00:00"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="14:00:00to15:00:00"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="15:00:00to16:00:00"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="16:00:00to17:00:00"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="17:00:00to18:00:00"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[1][]" value="18:00:00to19:00:00"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Wednesday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


      <div class="col">   
         Wednesday
         <div class='container small'> 
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="08:00:00to09:00:00"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="09:00:00to10:00:00"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="10:00:00to11:00:00"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="11:00:00to12:00:00"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="12:00:00to13:00:00"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="13:00:00to14:00:00"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="14:00:00to15:00:00"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="15:00:00to16:00:00"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="16:00:00to17:00:00"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="17:00:00to18:00:00"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[2][]" value="18:00:00to19:00:00"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Thursday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

      <div class="col">   
         Thursday
         <div class='container small'> 
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="08:00:00to09:00:00"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="09:00:00to10:00:00"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="10:00:00to11:00:00"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="11:00:00to12:00:00"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="12:00:00to13:00:00"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="13:00:00to14:00:00"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="14:00:00to15:00:00"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="15:00:00to16:00:00"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="16:00:00to17:00:00"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="17:00:00to18:00:00"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[3][]" value="18:00:00to19:00:00"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Friday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


      <div class="col">   
         Friday
         <div class='container small'> 
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="08:00:00to09:00:00"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="09:00:00to10:00:00"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="10:00:00to11:00:00"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="11:00:00to12:00:00"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="12:00:00to13:00:00"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="13:00:00to14:00:00"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="14:00:00to15:00:00"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="15:00:00to16:00:00"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info" >
                      <input type="checkbox" name="times[4][]" value="16:00:00to17:00:00"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="17:00:00to18:00:00"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[4][]" value="18:00:00to19:00:00"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Saturday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

      <div class="col">   
         Saturday
         <div class='container small'> 
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="08:00:00to09:00:00"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="09:00:00to10:00:00"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="10:00:00to11:00:00"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="11:00:00to12:00:00"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="12:00:00to13:00:00"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="13:00:00to14:00:00"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="14:00:00to15:00:00"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="15:00:00to16:00:00"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="16:00:00to17:00:00"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="17:00:00to18:00:00"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[5][]" value="18:00:00to19:00:00"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Sunday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

           <div class="col">   
         Sunday
         <div class='container small'> 
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="08:00:00to09:00:00"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="09:00:00to10:00:00"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="10:00:00to11:00:00"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="11:00:00to12:00:00"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="12:00:00to13:00:00"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="13:00:00to14:00:00"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="14:00:00to15:00:00"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="15:00:00to16:00:00"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="16:00:00to17:00:00"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="17:00:00to18:00:00"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group">
                 <label class="btn-sm btn-info">
                      <input type="checkbox" name="times[6][]" value="18:00:00to19:00:00"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
       </div> <!-- end col, end Sunday -->

      </div> <!-- close row -->

      <input type="submit" name="submitSuccess" value="Submit!"> <!-- onclick="submitAlert()"> -->
      
      <!-- Alternative button code: manually made
       <label class="timeSlots">
        <input type="checkbox" name="su2pm" value="su2pm"> 2pm - 3pm
      </label>-->

    </div> <!-- end container -->
   </form> 
  <br><br><br>
  </section> <!-- end content -->
 <!-- <script type="text/javascript">
    function submitAlert() {
      alert("Your information has been successfully submitted!");
    }
  </script> -->

<?php require 'inc/footer.php'; ?>

