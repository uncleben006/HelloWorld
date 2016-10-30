<?php

// input parameters
$id = $_REQUEST['id'];
$value = $_REQUEST['value'];
$scroll = $_REQUEST['scroll']; // scroll parameter

// input parameters validation
// ...
// ...

// save to database
// ...
// ..

// return to the main page with scroll parameter
header("Location: index.php?scroll=$scroll");

?>
