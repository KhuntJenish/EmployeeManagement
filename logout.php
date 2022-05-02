<?php
    session_start();
    $_SESSION['username'] = "";
    $_SESSION['logout'] = true;
    if ($_SESSION['logout']) {
        // var_dump($_SESSION['logout']);
    
        echo '<script>window.location.href = "index.php";</script>';
        exit;
    }
    
?>