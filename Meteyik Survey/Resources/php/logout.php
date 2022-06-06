<?php
     session_start();

     session_destroy();

     header('location: ../../Resources/html/login.php');
