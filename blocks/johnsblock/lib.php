<?php

require_once('johnsblock_form.php');
//namespace tool_datatables;



//THE getCourseCompletions FUNCTION NEEDS A WHERE timecompleted IS NOT NULL line to work with any db other than induction DB
  function getCourseCompletions() {//function to call all course completions per user
    require_once('../../config.php');
    //require_once($CFG->libdir . '/adminlib.php');
    global $CFG, $USER, $DB;
    $content         =  new stdClass;
    //SQL CALLS
    $users= $DB->get_records_sql('SELECT firstname, lastname, id FROM mdl_user');
    $courses = $DB->get_records_sql('SELECT shortname, id FROM mdl_course');
    $course_completions = $DB->get_records_sql('SELECT userid, course FROM mdl_course_completions');
    if (count($users) > 0) {
      // echo "<table border='5' class='stats' cellspacing='5'>
      //         <tr>
      //         <td class='hed' colspan='12'>Display's users name with course completions:        </td>
      //         </tr>
      //         <tr>
      //         <th>ID </th>
      //         <th> FIRST </th>
      //         <th> LAST </th>
      //         <th> COURSES</th>
      //         </tr>";

      //end of HEADING
         $usersa = array();
      foreach ($users as $user) {

        foreach ($course_completions as $course){
           if ($user->id == $course->userid){
             foreach ($courses as $course2) {
               if ($course->course == $course2->id){
                 // echo "<tr>";
                 // echo "<td>" . $user->id . "</td>";
                 // echo "<td>" . $user->firstname . "</td>";
                 // echo "<td>" . $user->lastname . "</td>";
                 // echo "<td>" . $course2->shortname . "</td>";
                 // echo "</tr>";


                     $u = array('id'   => $user->id,
                                'firstname'  => $user->firstname,
                                'lastname'   => $user->lastname,
                                'courses complete'       => $course2->shortname,
                     );

 $usersa[] = $u;

               }//end of if - html table item constructor
            // /   $usersa[] = $u;
             }//end of courses as course2

           }//end of if for choosing userID

         }//end of course completions as course

       }//end of users as user
     }//end of if to make sure it isnt null
    // echo "</table>";//end of HTML Table
    // $params = array("select" => true, "paginate" => false);
    // $params['buttons'] = array("selectAll", "selectNone");
    // $params['dom'] = 'Bfrtip';      // Needed to position buttons; else won't display.
    // $selector = '.datatable';

     return $usersa;
   }//end of function


   function getCourseEnrolments() {//function to call all course completions per user
     require_once('../../config.php');
     global $CFG, $USER, $DB;
     $content         =  new stdClass;
     //SQL CALLS
     $users= $DB->get_records_sql('SELECT firstname, lastname, id FROM mdl_user');
     $courses = $DB->get_records_sql('SELECT shortname, id FROM mdl_course');
     $course_completions = $DB->get_records_sql('SELECT userid, course FROM mdl_course_completions');
     if (count($users) > 0) {
       echo "<table border='5' class='stats' cellspacing='5'>
               <tr>
               <td class='hed' colspan='12'>Display's users name with course Enrolments:        </td>
               </tr>
               <tr>
               <th>ID </th>
               <th> FIRST </th>
               <th> LAST </th>
               <th> COURSES</th>
               </tr>";
               //end of HEADING
       foreach ($users as $user) {
         foreach ($course_completions as $course){
            if ($user->id == $course->userid){
              foreach ($courses as $course2) {
                if ($course->course == $course2->id){
                  echo "<tr>";
                  echo "<td>" . $user->id . "</td>";
                  echo "<td>" . $user->firstname . "</td>";
                  echo "<td>" . $user->lastname . "</td>";
                  echo "<td>" . $course2->shortname . "</td>";
                  echo "</tr>";
                }//end of if - html table item constructor
              }//end of courses as course2
            }//end of if for choosing userID
          }//end of course completions as course
        }//end of users as user
      }//end of if to make sure it isnt null
      echo "</table>";//end of HTML Table
      return null;
    }//end of function


    function getData(){
    $fields = "id,firstname,lastname,course complete";
    $firstinitial = '';
    $lastinitial = '';             // Limit results in testing.
    $page = '';
    $recordsperpage = 9999;


    // Convert from array-of-objects to array-of-arrays as needed by templates.
    $usersa = array();

        $u = array('id'   => "12",
                   'firstname'  => 'Test',
                   'lastname'   => 'Subject',
                   'course complete' => ':blobweary:',
        );
        $usersa[] = $u;

    return $usersa;
    }



//END OF CLASS
