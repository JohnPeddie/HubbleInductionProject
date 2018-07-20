<?php
function getData(){
$fields = "id,firstname,lastname,courses";
$firstinitial = '';
$lastinitial = '';             // Limit results in testing.
$page = '';
$recordsperpage = 9999;


// Convert from array-of-objects to array-of-arrays as needed by templates.
$usersa = array();
foreach ($users as $user) {
    $u = array('id'   => $user->username,
               'firstname'  => $user->firstname,
               'lastname'   => $user->lastname,
               'lastaccess' => $user->lastaccess,
               'auth'       => $user->auth,
    );
    $usersa[] = $u;
}
return $usersa;
}
