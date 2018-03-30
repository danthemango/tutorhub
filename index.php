<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  landing page for TutorHub
   Created:  2018-02-06 by Dan
   Modified: 2018-02-13 Dan: developed sample page with bootstrap
             2018-03-05 Sami: edited initial template and started developing the different sections
             2018-03-16 Sami: modified the form section
-->
<?php 
$pagetitle = "Welcome";
require 'inc/header.php'; 

$monday =0;
$tuesday =1;
$wednesday =2;
$thursday =3;
$friday =4;
$saturday =5;
$sunday =6;

?>

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
    <form class="text-center" method="post" action="search.php">
      <label for="course" ><b>Pick the course you would like to find a tutor for:</b></label><br>
      <select multiple id="courses" name="courses[]">
        <option value="CSCI112">CSCI 112 - (Applications Programming)</option>
        <option value="CSCI115">CSCI 115 - (Web Page Techniques)</option>
        <option value="CSCI160">CSCI 160 - (Computing Science I)</option>
        <option value="CSCI161">CSCI 161 - (Computing Science II)</option>
        <option value="CSCI162">CSCI 162 - (Topics in Computing Science)</option>
        <option value="CSCI261">CSCI 261 - (Computer Architecture and Assembly Language)</option>
        <option value="MATH121">MATH 121 - (Calculus I)</option>
        <option value="MATH123">MATH 123 - (Logic and Foundations)</option>
        <option value="CSCI251">CSCI 251 - (Systems and Networks)</option>
        <option value="CSCI260">CSCI 260 - (Data Structures)</option>
        <option value="CSCI265">CSCI 265 - (Software Engineering)</option>
        <option value="CSCI310">CSCI 310 - (Intro to Graphical User Interfaces)</option>
        <option value="CSCI331">CSCI 331 - (Object Oriented Programming)</option>
        <option value="CSCI370">CSCI 370 - (Database Systems)</option>
        <option value="CSCI375">CSCI 375 - (Intro to Systems Analysis)</option>
        <option value="CSCI400">CSCI 400 - (Computers and Society)</option>
      </select><br><br>
      <p><b>Check all the times that work for you:</b> &nbsp;
      <input id="day" type="checkbox" name="day" value="any">All</p>
      <div class="table-responsive">
      <table class="table">
       <tbody>
       <tr>
	   <th scope="row">Monday</th>
	   <td><input id="monAM" type="checkbox" name="times[<?php $monday ?>]" value="AM">Morning</td>
	   <td><input id="monPM" type="checkbox" name="times[<?php $monday ?>]" value="PM">Afternoon</td>
       </tr>
       <tr>
	   <th scope="row">Tuesday</th>
	   <td><input id="tueAM" type="checkbox" name="times[<?php $tuesday ?>]" value="AM">Morning</td>
	   <td><input id="tuePM" type="checkbox" name="times[<?php $tuesday ?>]" value="PM">Afternoon</td>
       </tr>
       <tr> 
           <th scope="row">Wednesday</th>
	   <td><input id="wedAM" type="checkbox" name="times[<?php wednesday ?>]" value="AM">Morning</td>
	   <td><input id="wedPM" type="checkbox" name="times[<?php wednesday ?>]" value="PM">Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Thursday</th>
	   <td><input id="thurAM" type="checkbox" name="times[<?php thursday ?>]" value="AM">Morning</td>
	   <td><input id="thurPM" type="checkbox" name="times[<?php thursday ?>]" value="PM">Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Friday</th>
	   <td><input id="friAM" type="checkbox" name="times[<?php friday ?>]" value="AM">Morning</td>
	   <td><input id="friPM" type="checkbox" name="times[<?php friday ?>]" value="PM">Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Satursday</th>
	   <td><input id="satAM" type="checkbox" name="times[<?php saturday ?>]" value="AM">Morning</td>
	   <td><input id="satPM" type="checkbox" name="times[<?php saturday ?>]" value="PM">Afternoon</td>
       </tr>
       <tr>
           <th scope="row">Sunday</th>
	   <td><input id="sunAM" type="checkbox" name="times[<?php sunday ?>]" value="AM">Morning</td>
	   <td><input id="sunPM" type="checkbox" name="times[<?php sunday ?>]" value="PM">Afternoon</td>
       </tr>
       </tbody>
     </thead>
     </table>
     <input class="btn btn-primary btn-lg"  type="submit" name="submit" value="Submit">
     </div>
    </form>
   </section>
   <br><br><br><br>
</section>
<?php require 'inc/footer.php'; ?>


