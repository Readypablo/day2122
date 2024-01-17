<?php

// выход пользователя из системы
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: ../../index.php");
    }
?>