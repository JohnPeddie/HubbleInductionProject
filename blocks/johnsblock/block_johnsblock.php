<?php
class block_johnsblock extends block_base {
    public function init() {
        $this->title = get_string('johnsblock', 'block_johnsblock');
      }






    public function get_content() {
        $this->content         =  new stdClass;


          $this->content->text = "This contains a breakdown for the database and the items it contains";
          $this->content->footer = html_writer::tag('a', 'View DB breakdown', array('href' => '/blocks/johnsblock/view.php'));

      return $this->content;
         $this->content->footer = html_writer::tag('a', 'Menu Option 1', array('href' => '/blocks/johnsblock/view.php'));

      return $this->content;
    }


}//END OF CLASS
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
