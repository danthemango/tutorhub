<?php
/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  test the php integration with the database
 * Created:  2018-03-14 by Daniel 
 * Modified: -
 */

require_once("../inc/dbinfo.inc");
try{
   $dbh = new PDO("mysql:host=$host;dbname=$user", $user, $password);
   $results = $dbh->query('select * from profiles');
   echo "<table>\n";
   foreach($results as $row){
      echo "<tr>\n";
      echo "<td>" . $row["email"] . "</td>\n";
      echo "<td>" . $row["firstname"] . "</td>\n";
      echo "<td>" . $row["lastname"] . "</td>\n";
      echo "<td>";
      if(isset($row["phone"])){
         echo "{$row["phone"]})";
      }else{
         echo "(no phone number)";
      }
      echo "</td>";
      echo "<td>" . $row["avatar"] . "</td>\n";
      echo "</tr>\n";
   }
   echo "</table>\n";
}catch(PDOException $e){
   echo "Error: " . $e->getMessage() . "<br />";
}

?>
