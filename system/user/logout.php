<?php 
	session_start();
    session_unset();
    // destroy the session  
    $url = "../../index.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>"; 
?>