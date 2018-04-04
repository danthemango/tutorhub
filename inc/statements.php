<?php
/*
 * Group:      SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:    To prepare a set of statements for access to the database
 * Created:    2018-03-25 By Dan
 * Modified:   2018-03-26 By Dan: adding more functions for search.php
 *             2018-03-28 By Dan: completed putTimesInProfiles
 *             2018-04-01 By Dan: added JSON function for times
 * Sources:    - http://php.net/manual/en/pdostatement.bindparam.php
 */

require_once("inc/dbinfo.inc");

try{
   $dbh = new PDO("mysql:host=$host;dbname=$user", $user, $password);
   $getNumProfilesStatement = $dbh->prepare('select count(*) from profiles');
   $getTimesFromIDStatement = $dbh->prepare('select id, daynum, starttime, endtime from times where id = :id');
   $getSkillsFromIDStatement = $dbh->prepare('select class from times where id = :id');
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

// returns true if class code is valid
function isValidClassCode($code){
   // TODO should use a has_presence function here instead
   // TODO consider grabbing class-codes from the 'skills' table in the database
   return is_string($code) && strlen($code) > 0 && strlen($code) <= 10 && ctype_alnum($code);
}

// returns an error statement if the post information is invalid
// note: submission must be set, and there has to exist at least one
//       course and at least one time to search (to ensure the user
//       knows why there are no results
function isValidSearchPost($getty){
   if(!isset($getty['submit']) || $getty['submit'] != "Submit"){
      return "<p>No search made</p>";
   }
   if(!isset($getty['courses']) || !is_array($getty['courses'])){
      return "<p>Please select some courses</p>";
   }
   if((!isset($getty['times']) || !is_array($getty['times']))
      && (!isset($getty['day']) || !is_string($getty['day']))){
      return "<p>Need to specify some timeframe</p>";
   }
   if(count($getty['courses']) <= 0 || (count($getty['times']) <= 0
      && $getty['day'] != "any")){
      return "<p>Please select some courses and a timeframe</p>";
   }
   return "";
}

// returns true if number is a valid ID
function isValidID($id){
   if(!is_numeric($id)){
      return false;
   }

   // XXX maybe check if it's in the database too
   return true;
}

// returns true if timeString given is a valid timestamp
// useful for the MySQL timestamp format
// from '0:0:0' to '23:59:59'
function isValidTimeString($timeString){
   if(!is_string($timeString)){
      return false;
   }
   $parts = explode(':',$timeString);

   return count($parts) == 3
      && is_numeric($parts[0]) && is_numeric($parts[1]) && is_numeric($parts[2])
      && $parts[0] >= 0 && $parts[0] <= 24
      && $parts[1] >= 0 && $parts[1] < 60
      && $parts[2] >= 0 && $parts[2] < 60;
}

// returns true if value given is a valid weekday number (or numeric string)
// ( 0 to 6 for monday to sunday)
function isValidWeekdayNum($wk){
   return is_numeric($wk) && $wk >= 0 && $wk <= 6;
}

// returns true if this is a valid time array
// and, from the SQL table structure it has the structure:
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

// returns the total number of profiles in the database
// XXX remove? not used anywhere
function getNumProfiles(){
   global $getNumProfilesStatement;
   if(!$getNumProfilesStatement){
      return false;
   }
   $getNumProfilesStatement->execute();
   return $getNumProfilesStatement->fetchColumn();
}

// returns the number of profiles which match the search query
// TODO fetch only relevant results
function getNumResults($form_day,$form_times,$form_courses){
   global $dbh;

   // an array to hold all of the conditions we will use in our search
   $conditionSqlArr = [];

   // filter by profile type (tutors only)
   $conditionSqlArr[] = 'ptype = "tutor"';

   // filter by schedule times, unless the user said they were fine any time and day
   if(!$form_day){
      $conditionSqlArr[] = getTimesSqlBindings($form_times);
   }

   // filter by classes
   $conditionSqlArr[] = getCoursesSqlBindings($form_courses);

   // construct the sql parts
   $sql = 'select count(*) from profiles where ';
   $sql .= implode(' and ',$conditionSqlArr);

   $stmt = $dbh->prepare($sql);
   if(!$stmt){
      // TODO log error
      return 0;
   }

   //////////////
   // bindings //
   //////////////

   // bind the schedule pieces
   if(!$form_day){
      doTimesSqlBindings($stmt,$form_times);
   }

   // bind the form courses in the statement
   doCoursesSqlBindings($stmt,$courseTags,$form_courses);

   $stmt->execute();
   return $stmt->fetchColumn();
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

// returns a JSON string of all times available to a user specified by ID
// check out https://github.com/Yehzuna/jquery-schedule for more information
// data format: (an array of 'days' with each day as a number and array of periods)
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
// ],
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

// returns the JSON of the times array when taken from the POST variable
function getTimesFromPOSTasJSON($getty){
   $form_times = [];
   if(!isset($getty['times']) || !is_array($getty['times'])){
      return "";
   }
   foreach($getty['times'] as $day => $periods){
      if(!isValidWeekdayNum($day)){
         return "";
      }else{
         if(!is_array($periods)){
            return "";
         }
         foreach($periods as $period){
            $periodObj = json_decode($period);
            if(is_null($periodObj)){
               return "";
            }else if(!isValidTimeString($periodObj->start)){
               return "";
            }else if(!isValidTimeString($periodObj->end)){
               return "";
            }else{
               $newval = [];
               $newVal['day'] = $day;
               $period = [];
               $period['start'] = $periodObj->start;
               $period['end'] = $periodObj->end;
               $period['title'] = 'you';
               $period['textColor'] = '#a8a8a8';
               $period['backgroundColor'] = '#ffffff';
               $period['borderColor'] = 'black';
               $newVal['periods'] = [$period];
               $form_times[] = $newVal;
            }
         }
      }
   }
   $result = json_encode($form_times);
   if(is_null($result)){
      return false;
   }else{
      return $result;
   }
}

// returns the extra sql bindings necessary for the day periods
function getTimesSqlBindings(&$form_times){
   $i = 0;
   $periodSqlArr = [];
   foreach($form_times as $day => $periods){
      foreach($periods as $period){
         $day_sql = '';
         $day_sql .= "(times.daynum = :day" . $i++ . " and (";
         $day_sql .= "(starttime <= :form_starttime".$i++. " and endtime >= :form_starttime".$i++.") or ";
         $day_sql .= "(starttime <= :form_endtime".$i++. " and endtime >= :form_endtime" . $i++ . ") or ";
         $day_sql .= "(starttime > :form_starttime".$i++. " and endtime < :form_endtime".$i++."))";
         $day_sql .= ')';
         $periodsSqlArr[] = $day_sql;
      }
   }
   $sql = 'profiles.id in (select id from times where' . implode(' or ',$periodsSqlArr) . ")";
   return $sql;
}

// binds the values from from form_times into a prepared statement
function doTimesSqlBindings(&$stmt,&$form_times){
   $i = 0;
   foreach($form_times as $day => $periods){
      foreach($periods as $period){
         $stmt->bindParam(":day".$i++, $day);
         $stmt->bindParam(":form_starttime".$i++, $period[0]);
         $stmt->bindParam(":form_starttime".$i++, $period[0]);
         $stmt->bindParam(":form_endtime".$i++, $period[1]);
         $stmt->bindParam(":form_endtime".$i++, $period[1]);
         $stmt->bindParam(":form_starttime".$i++, $period[0]);
         $stmt->bindParam(":form_endtime".$i++, $period[1]);
      }
   }
}

// returns the extra sql bindings necessary for the courses specified
function getCoursesSqlBindings(&$form_courses){
   $i = 0;

   foreach($form_courses as $course){
      $courseTags[] = ':course'.$i++;
   }
   return 'profiles.id in (select id from skills where class in ('.implode(' , ',$courseTags).'))';
}

function doCoursesSqlBindings(&$stmt,&$courseTags,&$form_courses){
   $i = 0;
   foreach($form_courses as $course){
      $stmt->bindParam(':course'.$i++, $course);
   }
}

// returns profiles given the search parameters
// TODO actually use search parameters
function getProfiles($startPos = 0, $numResults = 10, $form_day, $form_times, $form_courses){
   global $dbh;
   $results = array();

   // an array to hold all of the conditions we will use in our search
   $conditionSqlArr = [];

   // filter by profile type (tutors only)
   $conditionSqlArr[] = 'ptype = "tutor"';

   // filter by schedule times, unless the user said they were fine any time and day
   if(!$form_day){
      $conditionSqlArr[] = getTimesSqlBindings($form_times);
   }

   // filter by classes
   $conditionSqlArr[] = getCoursesSqlBindings($form_courses);

   // construct the sql parts
   $sql = 'select profiles.id, profiles.firstname, profiles.lastname, profiles.phone, profiles.avatar, (select group_concat(skills.class) from skills where skills.id = profiles.id) as courses from profiles ';
   $sql .= 'where ';
   $sql .= implode(' and ',$conditionSqlArr);
   $sql .= ' limit :startPos, :numResults;';

   $stmt = $dbh->prepare($sql);
   if(!$stmt){
      // TODO log error
      return [];
   }

   // bind the page limits
   $stmt->bindParam(':startPos', $startPos);
   $stmt->bindParam(':numResults', $numResults);

   // bind the schedule pieces
   if(!$form_day){
      doTimesSqlBindings($stmt,$form_times);
   }

   // bind the form courses in the statement
   doCoursesSqlBindings($stmt,$courseTags,$form_courses);

   if(!$stmt){
      return [];
   }else{
      $stmt->execute();
      $results = $stmt->fetchAll();
   }
   return escapeAll($results);
}

?>
