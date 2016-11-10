<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    session_unset();     
    session_destroy();  
}
$_SESSION['LAST_ACTIVITY'] = time(); 
?>