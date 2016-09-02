<?php 
	session_start();
    session_unset();
    // destroy the session  
    $url = "http://localhost:8080/JOMO/index6.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>"; 
?>