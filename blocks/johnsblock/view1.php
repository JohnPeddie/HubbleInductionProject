<?php

require_once('../../config.php');
//require_once($CFG->libdir . '/adminlib.php');
require('lib.php');


//admin_externalpage_setup('datatables_test');
$title = get_string('pluginname', 'tool_datatables');
$PAGE->set_title('DB Report');
$PAGE->set_heading('DB Report');


// Set up DataTable with passed options.
$fields = "id,firstname,lastname,courses";
$firstinitial = '';
$lastinitial = '';             // Limit results in testing.
$page = '';
$recordsperpage = 9999;
$params = array("select" => true, "paginate" => false);
$params['buttons'] = array("selectAll", "selectNone");
$params['dom'] = 'Bfrtip';      // Needed to position buttons; else won't display.
$selector = '.datatable';

$PAGE->requires->js_call_amd('tool_datatables/init', 'init', array($selector, $params));

$PAGE->requires->css('/admin/tool/datatables/style/dataTables.bootstrap.css');
$PAGE->requires->css('/admin/tool/datatables/style/select.bootstrap.css');

echo $OUTPUT->header();
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

 if ($selected_val == "Course Completions"){
   echo "Course completions are as follows:";

   $renderer = $PAGE->get_renderer('tool_datatables');
   print_object(getCourseCompletions());
   echo $renderer->test(getData());

   //getCourseCompletions();
   //echo $renderer->view(array(getCourseCompletions()));
    }//end of get course completions
    if ($selected_val == "Course Enrolments"){
      echo "Course Enrolments are as follows:";
       getCourseEnrolments();
     }//end of getCourseEnrolments
  }//end of If
// if ($selected_val == "Course Enrolments"){
//   echo "Course Enrolments are as follows:";
//   //getCourseEnrolments();
//   }//end of getCourseEnrolments
echo $OUTPUT->footer();
