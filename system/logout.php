<?php 
        session_unset(); 
        session_destroy();
        // destroy the session  
        $url = "http://localhost:8080/JOMO/index6.html";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>"; 
?>