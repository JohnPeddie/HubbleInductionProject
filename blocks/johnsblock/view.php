<?php

require_once('../../config.php');
require_once('johnsblock_form.php');
require_once('lib.php');
require("$CFG->libdir/tablelib.php");
global $CFG, $USER, $DB, $PAGE, $OUTPUT;




$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);
$PAGE->set_pagelayout('standard');
$PAGE->set_title('DB Report');
$PAGE->set_heading('DB Report');
$PAGE->set_url($CFG->wwwroot.'/blocks/johnsblock/view.php', array('id' => 3));
echo $OUTPUT -> header();
echo "Please choose the option from the drop down menu for the data you would like to view:";
echo "<br>";
echo '<form action="#" method="post">';
echo '<select name = "Option">';
echo '<option value="------">------</option>';
echo '<option value="Course Completions">Completions</option>';
echo '<option value="Course Enrolments">Enrolments</option>';
echo '</select>';
echo '<input type="submit" name="submit" value="Get Selected Values" />';
echo '</form>';
if(isset($_POST['submit'])){
$selected_val = $_POST['Option'];
//$renderer = $PAGE->get_renderer('tool_datatables');
if ($selected_val == "Course Completions"){
  echo "Course completions are as follows:";
  //getCourseCompletions();
  // $table = new flexible_table('Car Bookings');
  //           $table->define_baseurl(new moodle_url("blocks/johnsblock/view.php"));
  //               $table->define_columns(array(
  //                   'carname',
  //                   'platenumber',
  //                   'pickupdate',
  //                   'tankdate',
  //                   'city',
  //                   'actions',
  //               ));
  //           $table->define_headers(array(
  //                   'car name',
  //                   'plate number',
  //                   'pick-up date',
  //                   'tank date',
  //                   'city',
  //                   'actions',
  //               ));
  //           $table->sortable(true, 'carname');
  //           $table->collapsible(false);
  getCourseCompletions();
   }//end of get course completions
if ($selected_val == "Course Enrolments"){
  echo "Course Enrolments are as follows:";
  getCourseEnrolments();
  }//end of getCourseEnrolments
}//end of submit if
echo $OUTPUT -> footer();
