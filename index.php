<?php
$pagetitle = "Welcome";
require 'inc/header.php';
?>
<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  landing page for TutorHub
   Created:  2018-02-06 by Dan
   Modified: 2018-02-13 Dan: developed sample page with bootstrap
             2018-03-05 Sami: edited initial template and started developing the different sections
             2018-03-16 Sami: modified the form section
	     2018-04-06 Sami: Minor fixes
-->

<br><br>
<section class="with-overflow">
   <section class="main with-background h-100 container-fluid">
   <div class="jumbotron"><br><br><br><br>
    <h1 class="display-3">Welcome</h1><br><br><br>
    <p class="lead">TutorHub is a simple tutor finding service. Want some help in a class you're taking now? See if anyone is available:</p>
    <a class="btn btn-primary btn-lg" href="#section1" role="button">Find a Tutor</a><br><br>
   </div>
   </section>
   <section id="section1"><br><br><br><br>
    <form class="text-center" method="get" action="search.php">
      <label for="course" ><b>Pick the course you would like to find a tutor for:</b></label><br>
      <select multiple id="courses" name="courses[]">
        <option value="csci160">CSCI 160 - (Computing Science I)</option>
        <option value="csci161">CSCI 161 - (Computing Science II)</option>
	<option value="csci162">CSCI 162 - (Topics in Computing Science)</option>
        <option value="csci260">CSCI 260 - (Data Structures)</option>
        <option value="csci261">CSCI 261 - (Computer Architecture and Assembly Language)</option>
        <option value="csci265">CSCI 265 - (Software Engineering)</option>
	<option value="csci310">CSCI 310 - (Intro to Graphical User Interfaces)</option>
        <option value="csci311">CSCI 311 - (Web Programming)</option>
	<option value="csci320">CSCI 320 - (Foundations of Computer Science)</option>
        <option value="csci330">CSCI 330 - (Programming Languages)</option>
	<option value="csci355">CSCI 355 - (Digital Logic and Computer Organization)</option>
        <option value="csci370">CSCI 370 - (Database Systems)</option>
        <option value="csci375">CSCI 375 - (Intro to Systems Analysis)</option>
	<option value="csci400">CSCI 400 - (Computers and Society)</option>
        <option value="csci460">CSCI 460 - (Networks and Communications)</option>
        <option value="csci485">CSCI 485 - (Topics in Systems)</option>
      </select><br><br>
      <p><b>Check all the times that work for you:</b> &nbsp;
      <input id="day" type="checkbox" name="day" value="any">All</p>
      <div class="table-responsive">
      <table class="table">
       <tbody>
       <tr>
	   <th scope="row">Monday</th>
	   <td><input id="monAM" type="checkbox" name="times[0][]" value='{"start":"00:00:00","end":"12:00:00"}'>Morning</td>
	   <td><input id="monPM" type="checkbox" name="times[0][]" value='{"start":"12:00:00","end":"24:00:00"}'>Afternoon</td>
       </tr>
       <tr>
	   <th scope="row">Tuesday</th>
	   <td><input id="tueAM" type="checkbox" name="times[1][]" value='{"start":"00:00:00","end":"12:00:00"}'>Morning</td>
	   <td><input id="tuePM" type="checkbox" name="times[1][]" value='{"start":"12:00:00","end":"24:00:00"}'>Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Wednesday</th>
	   <td><input id="wedAM" type="checkbox" name="times[2][]" value='{"start":"00:00:00","end":"12:00:00"}'>Morning</td>
	   <td><input id="wedPM" type="checkbox" name="times[2][]" value='{"start":"12:00:00","end":"24:00:00"}'>Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Thursday</th>
	   <td><input id="thurAM" type="checkbox" name="times[3][]" value='{"start":"00:00:00","end":"12:00:00"}'>Morning</td>
	   <td><input id="thurPM" type="checkbox" name="times[3][]" value='{"start":"12:00:00","end":"24:00:00"}'>Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Friday</th>
	   <td><input id="friAM" type="checkbox" name="times[4][]" value='{"start":"00:00:00","end":"12:00:00"}'>Morning</td>
	   <td><input id="friPM" type="checkbox" name="times[4][]" value='{"start":"12:00:00","end":"24:00:00"}'>Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Satursday</th>
	   <td><input id="satAM" type="checkbox" name="times[5][]" value='{"start":"00:00:00","end":"12:00:00"}'>Morning</td>
	   <td><input id="satPM" type="checkbox" name="times[5][]" value='{"start":"12:00:00","end":"24:00:00"}'>Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Sunday</th>
	   <td><input id="sunAM" type="checkbox" name="times[6][]" value='{"start":"00:00:00","end":"12:00:00"}'>Morning</td>
	   <td><input id="sunPM" type="checkbox" name="times[6][]" value='{"start":"12:00:00","end":"24:00:00"}'>Afternoon</td>
       </tr>
       </tbody>
     </thead>
     </table>
     <input class="btn btn-primary btn-lg"  type="submit" name="submit" value="Submit">
     </div>
    </form>
   </section>
<br><br><br>
</section>
<?php require 'inc/footer.php'; ?>


