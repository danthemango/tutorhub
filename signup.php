<!DOCTYPE html>
<!--
   Group:   SCAD (Sami, Camille, Angelo, and Dan)
   Purpose: landing page for TutorHub Sign up
   Created: 2018-02-06 by Dan
   Modified:2018-02-13 Dan: developed sample page with bootstrap
			2018-02-20 Camille: made a copy and minor changes 
      2018-03-10 Camille: made major page edits- added personal info section
      2018-03-12 Camille: added course selection and tried implementing collapsible schedules
      2018-03-14 Camille: 
-->

<style>
  .myForm, h2, h3, button {
    text-align: center;
    font-weight: bold;  
    font-size: 140%;
  }

  h2 {
    margin-top:10px;
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
  }


</style>

<?php 

$pagetitle = "Welcome";
require 'inc/header.php'; 

?>

   <section class="main h-100">
      <div class="jumbotron">
        <h1 class="display-3">Sign up now!</h1>
      </div>

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Personal info ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <h2> Profile Creation </h2>
  <h3> Personal Information </h3>

  <form action="#" class='myForm'>
  First name:<br>
  <input type="text" name="firstname">
  <br>
  Last name:<br>
  <input type="text" name="lastname">
  <br>
  Email (username)<br>
  <input type="text" name="email">
  <br>
  Password:<br>
  <input type="text" name="password">
  <br>
  Phone number: <br>
  <input type="text" name="phone">
  <br><br><br><br>

  <hr>

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Course selection ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <h2> Courses </h2>
  <h3> I am interested in tutoring in the following courses: </h3> <br>

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ First year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> First year: </h4></div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci160" value="CSCI160"> 
          CSCI160 <br> <small> Computing Science I </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci161" value="CSCI161"> 
          CSCI161 <br> <small> Computing Science II </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci162" value="CSCI162"> 
          CSCI162 <br> <small> Topics in Computing Science </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Second year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> Second year: </h4></div>
      <!--<div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci251" value="CSCI251"> 
          CSCI251 <br> <small> Systems and Networks </small>
      </div>-->
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci260" value="CSCI260"> 
          CSCI260 <br> <small> Data Structures and Algorithms </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci261" value="CSCI261"> 
          CSCI261 <br> <small> Computer Architecture and Assembly Language </small>
      </div>
        <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci265" value="CSCI265"> 
          CSCI265 <br> <small> Software Engineering </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Third year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> Third year: </h4></div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci310" value="CSCI310"> 
          CSCI310 <br> <small> Introduction to Human-Computer Interaction </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci311" value="CSCI311"> 
          CSCI311 <br> <small> Web Programming </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci320" value="CSCI320"> 
          CSCI320 <br> <small> Foundations of Computer Science </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->

 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ More third year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> </div>
        <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci330" value="CSCI330"> 
          CSCI330 <br> <small> Programming Languages </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci355" value="CSCI355"> 
          CSCI355 <br> <small> Digital Logic and Computer Organization </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci370" value="CSCI370"> 
          CSCI370 <br> <small> Database Systems </small>
      </div>

    </div> <!-- close row -->

  </div> <!-- end container -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Fourth year courses ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

  <div class='container-fluid'>
    <div class="row">
      <div class="col-md-3"> <h4> Fourth year: </h4></div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci400" value="CSCI400"> 
          CSCI400 <br> <small> Computers and Society </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci460" value="CSCI460"> 
          CSCI460 <br> <small> Networks and Communications </small>
      </div>
      <div class="col-md-3">   
          <input class='courses' type="checkbox" name="csci485" value="CSCI485"> 
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
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m8am" value="m8am"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m9am" value="m9am"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m10am" value="m10am"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m11am" value="m11am"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m12pm" value="m12pm"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m1pm" value="m1pm"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m2pm" value="m2pm"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m3pm" value="m3pm"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m4pm" value="m4pm"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m5pm" value="m5pm"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="m6pm" value="m6pm"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Tuesday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <div class="col">   
         Tuesday
         <div class='container small'> 
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu8am" value="tu8am"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu9am" value="tu9am"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu10am" value="tu10am"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu11am" value="tu11am"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu12pm" value="tu12pm"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu1pm" value="tu1pm"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu2pm" value="tu2pm"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu3pm" value="tu3pm"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu4pm" value="tu4pm"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu5pm" value="tu5pm"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="tu6pm" value="tu6pm"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Wednesday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


      <div class="col">   
         Wednesday
         <div class='container small'> 
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w8am" value="w8am"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w9am" value="w9am"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w10am" value="w10am"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w11am" value="w11am"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w12pm" value="w12pm"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w1pm" value="w1pm"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w2pm" value="w2pm"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w3pm" value="w3pm"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w4pm" value="w4pm"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w5pm" value="w5pm"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="w6pm" value="w6pm"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Thursday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

      <div class="col">   
         Thursday
         <div class='container small'> 
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th8am" value="th8am"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th9am" value="th9am"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th10am" value="th10am"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th11am" value="th11am"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th12pm" value="th12pm"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th1pm" value="th1pm"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th2pm" value="th2pm"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th3pm" value="th3pm"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th4pm" value="th4pm"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th5pm" value="th5pm"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="th6pm" value="th6pm"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Friday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


      <div class="col">   
         Friday
         <div class='container small'> 
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f8am" value="f8am"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f9am" value="f9am"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f10am" value="f10am"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f11am" value="f11am"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f12pm" value="f12pm"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f1pm" value="f1pm"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f2pm" value="f2pm"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f3pm" value="f3pm"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f4pm" value="f4pm"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f5pm" value="f5pm"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="f6pm" value="f6pm"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->


  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Saturday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

      <div class="col">   
         Saturday
         <div class='container small'> 
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa8am" value="sa8am"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa9am" value="sa9am"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa10am" value="sa10am"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa11am" value="sa11am"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa12pm" value="sa12pm"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa1pm" value="sa1pm"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa2pm" value="sa2pm"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa3pm" value="sa3pm"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa4pm" value="sa4pm"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa5pm" value="sa5pm"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="sa6pm" value="sa6pm"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
      </div> <!-- end col -->

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Sunday ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

           <div class="col">   
         Sunday
         <div class='container small'> 
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su8am" value="su8am"> 8am - 9am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su9am" value="su9am"> 9am - 10am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su10am" value="su10am"> 10am - 11am
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su11am" value="su11am"> 11am - 12pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su12pm" value="su12pm"> 12pm - 1pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su1pm" value="su1pm"> 1pm - 2pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su2pm" value="su2pm"> 2pm - 3pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su3pm" value="su3pm"> 3pm - 4pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su4pm" value="su4pm"> 4pm - 5pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su5pm" value="su5pm"> 5pm - 6pm
                  </label>
             </div>
             <div class="row btn-group" data-toggle="buttons">
                 <label class="btn-sm btn-info" data-toggle="button">
                      <input type="checkbox" name="su6pm" value="su6pm"> 6pm - 7pm
                  </label>
             </div>
          </div> <!-- end container -->
       </div> <!-- end col, end Sunday -->

      </div> <!-- close row -->

    </div> <!-- end container -->

    <input type="submit" value="Submit">
    
   </form> 

  </section> <!-- end content -->

<?php require 'inc/footer.php'; ?>

<!--

  <div class='container weekdays'>
    <div class="row justify-content-center align-items-center"> 

      <div class="col m-3">   
          Monday
          <div class='container small'>
            <div class='row'>
               <input type="checkbox" name="8am" value="8am"> 8am - 9am
            </div>
            <div class='row'>
              9am - 10am
            </div>
            <div class='row'>
              10am - 11am
            </div>
          </div>
      </div>
      <div class="col-1 m-3">   
          <input type="checkbox" name="tuesday" value="tuesday"> Tuesday
      </div>
      <div class="col-1 m-3">   
          <input type="checkbox" name="wednesday" value="wednesday"> Wednesday
      </div>
      <div class="col-1 m-3">   
          <input type="checkbox" name="thursday" value="thursday"> Thursday
      </div>
      <div class="col-1 m-3">   
          <input type="checkbox" name="friday" value="friday"> Friday
      </div>
      <div class="col-1 m-3">   
          <input type="checkbox" name="saturday" value="saturday"> Saturday
      </div>
      <div class="col-1 m-3">   
          <input type="checkbox" name="sunday" value="sunday"> Sunday
      </div> -->
