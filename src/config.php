<?php 


require 'inc/db.php';
require 'forum.class.php';

$forums = new Forum($connect);
$errors = array(); //creates the $errors[] array.

ob_start('ob_gzhandler');

?>

