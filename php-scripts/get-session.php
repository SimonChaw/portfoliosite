<?php
    session_start($_GET['session_id']);

    echo $_SESSION['user_login_status'];
?>