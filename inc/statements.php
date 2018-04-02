<?php
/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  To prepare a set of statements for access to the database
 * Created:  2018-03-25 By Dan
 * Modified: 2018-03-26 By Dan: adding more functions for search.php
 * Modified: 2018-03-28 By Dan: completed putTimesInProfiles
 */

require_once("inc/dbinfo.inc");
try{
   $dbh = new PDO("mysql:host=$host;dbname=$user", $user, $password);
   $getTimesFromIDStatement = $dbh->prepare('select id, daynum, starttime, endtime from times where id = :id');
}catch(PDOException $e){
      echo "<p style=\"color:red\">Error: please contact your web administrator.</p>";
      // for debugging: echo "error from database: " . $e->getMessage() . "<br />\n";
}

$daysPerWeek = 7; // fun fact

// runs htmlspecialchars on all key-value pairs given
function escapeAll($results){
   $i=0;
   foreach($results as $row){
      foreach($row as $field => $value){
         $retval[$i][$field] = htmlspecialchars($value);
      }
      $i++;
   }
   return $retval;
}

// returns true if number is a valid ID
function isValidID($id){
   if(!is_numeric($id)){
      return false;
   }

   // XXX maybe check if it's in the database too
   return true;
}

// returns true if passed a valid timeString as argument
// note: only accepts strings in the format "00:00:00" in 24h format
function isValidTimeString($timeString){
   if(!is_string($timeString)){
      return false;
   }
   // TODO reject strings of an incorrect format (sami?)
   return true;
}

// returns true if value given is a valid weekday number (or numeric string)
// ( 0 to 6 for monday to sunday)
function isValidWeekdayNum($wk){
   return is_numeric($wk) && $wk >= 0 && $wk <= 6;
}

// returns true if this is a valid time array
// and, due to the PDO fetching is the PHP equivalent of the SQL tables we created, it has the format:
//    time['id']        - id of the user who added this time
//    time['daynum']    - number corresponding to the weekday for this element
//    time['starttime'] - availability starting time
//    time['endtime']   - availability ending time
function isValidTimeArr($time){
   if(!isset($time['id']) || !isset($time['daynum']) || !isset($time['starttime'])
      || !isset($time['endtime'])){
      return false;
   }else if(!isValidID($time['id']) || !isValidWeekdayNum($time['daynum'])
      || !isValidTimeString($time['starttime']) || !isValidTimeString($time['endtime'])){
      return false;
   }else{
      return true;
   }
}

// open up a database connection
try{
   $dbh = new PDO("mysql:host=$host;dbname=$user", $user, $password);
   // fixing bug where PDO will turn every integer constant into a string which breaks a bunch
   //    of queries and is in no way obvious that it is happening
   // source: https://stackoverflow.com/questions/11738451/error-while-using-pdo-prepared-statements-and-limit-in-query
   $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
}catch(PDOException $e){
      $err .= "<p style=\"color:red\">Error code 420: please contact your web administrator.</p>";
}

////////////////
// search.php //
////////////////

// returns the total number of results to display on the search page
// TODO fetch only relevant results
function getTotalResults(){
   global $dbh;
   return ($dbh->query('select count(*) from profiles'))->fetchColumn();
}

// returns all times from the database
// XXX doesn't seem to be needed anywhere
function getAllTimes(){
   global $dbh;
   $sql = 'select id, daynum, starttime, endtime from times';
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   return escapeAll($stmt->fetchAll());
}

// returns all times a user is available, given by an ID
function getTimesFromID($id){
   global $getTimesFromIDStatement;

   // ensure prepared statement is valid;
   if(!$getTimesFromIDStatement){
      // TODO log error message
      return [];
   }

   $getTimesFromIDStatement->execute([":id"=>$id]);
   return $getTimesFromIDStatement->fetchAll();
}

// returns all times from the database from a given array of IDs
function getTimesFromIDs($IDs){
   global $dbh;

   $times = [];
   for($i = 0; $i < count($IDs); $i++){
      $times[$i] = getTimesFromID($IDs[$i]);
   }
   return $times;
}

// returns all times for a set of profiles
function getTimesFromProfiles($profiles){
   $IDs = getIDsFromProfiles($profiles);
   return getTimesFromIDs($IDs);
}

// returns an array of profile IDs received from a 'profiles' array
function getIDsFromProfiles($profiles){
   $i = 0;
   foreach($profiles as $profile){
      $id = $profile['id'];
      if(isset($id) && is_numeric($id)){
         $IDs[$i++] = $id;
      }
   }
   return $IDs;
}

// takes a list of profiles and sets the times when these users are available
//
//    time availability information is put in the profile with format:
//    $profiles[$id]['times'][$daynum][$availabilityIndex]['starttime'] for the start time
//    $profiles[$id]['times'][$daynum][$availabilityIndex]['starttime'] for the end time
//
//    $daynum is an integer corresponding to a day of the week, starting at 0 for Monday
//    up to 6 for Sunday
//
//    $availabilityIndex is an integer corresponding to the availability's placement in the
//    array for that day (there's no upper bound, people can declare themselves available for
//    up to 86400 second-long availability increments in a single day theoretically)
//    (the index numbers don't mean anything, they are there for good luck)
//
// (e.g. if the user with id 12 is available from 2:00 PM to 3:00 PM on thursdays then
//    $profiles[12]['times'][3][]['starttime'] = '14:00:00'
//    and
//    $profiles[12]['times'][3][]['endtime'] = '15:00:00'
// )
function putTimesInProfiles(&$profiles){
   global $dbh;

   // get availability times from those profiles
   $profileTimes = getTimesFromProfiles($profiles);

   // initialize the 'times' array in each profiles
   foreach($profiles as &$profile){
      $profile['times'] = [];
   }

   // put times into profiles
   foreach($profileTimes as $times){
      foreach($times as $time){
         if(isValidTimeArr($time)){
            $profiles[$time['id']]['times'][$time['daynum']][] =
               ['starttime' => $time['starttime'], 'endtime' => $time['endtime']];
         }
      }
      return $profiles;
   }
}

// returns a JSON string of all times available to a user specified by ID
// check out https://github.com/Yehzuna/jquery-schedule for more information
// data format:
// [
//     {
//         "day": "Day number",
//         "periods": [
//             {
//                 "start": "Period start time",
//                 "end": "Period end time",
//                 "title": "Period title",
//                 "backgroundColor": "Period background color",
//                 "borderColor":"Period border color",
//                 "textColor": "Period text color"
//             }
//         ]
//     }
// ]
function getTimesFromIDasJSON($id){
   $times = getTimesFromID($id);
   # create a new array to hold times ordered by day
   $days = [];
   foreach($times as $time){
      if(isValidTimeArr($time)){
         $days[$time['daynum']][] = [$time['starttime'],$time['endtime']];
      }
   }
   # and create another to store them in the correct format
   $result = [];
   foreach($days as $day => $periods){
      $result[] = ['day' => $day, 'periods' => $periods];
   }
   # and return these
   return json_encode($result);
}

// returns profiles given the search parameters
// TODO actually use search parameters
function getProfiles($startPos = 0, $numResults = 10){
   global $dbh;
   $results = array();
   $sql = 'select profiles.id, profiles.firstname, profiles.lastname, profiles.phone, profiles.avatar, (select group_concat(skills.class) from skills where skills.id = profiles.id) as courses from profiles where ptype = "tutor" limit :startPos , :numResults';
   $stmt = $dbh->prepare($sql);
   // http://php.net/manual/en/pdostatement.bindparam.php
   if(!$stmt->execute([':startPos' => $startPos, ':numResults' => $numResults])){
      $err .= "<p style=\"color:red\">Error code 421: please contact your web administrator.</p>";
   }else{
      $stmt->execute();
      $results = $stmt->fetchAll();
   }
   return escapeAll($results);
}

?>
