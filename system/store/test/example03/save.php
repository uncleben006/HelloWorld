<?php

// input parameters
$p1 = $_REQUEST['p1'];
$p2 = $_REQUEST['p2'];
$p3 = $_REQUEST['p3'];
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
