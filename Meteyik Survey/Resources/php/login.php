<?php

require "db.inc.php";
require "validation.inc.php";

session_start();

// isset($_POST["email"]) && isset($_POST["password"])

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["email"] == "admin@gmail.com" && ($_POST["password"]) == "iamadmin") {

        $_SESSION['role'] = "admin";
        header("location: ../../Resources/html/admindash.php");
    } else {
        if (isset($_POST["email"]) && isset($_POST["password"])) {

            $email = setup_input($_POST["email"]);
            $password = md5(setup_input($_POST["password"]));

            $sql = "SELECT u_email FROM user WHERE u_email = '" . $email . "' and u_password = '" . $password . "'";
            $result = $conn->query($sql);

            $result_count = $result->num_rows;

            if ($result_count > 0) {
                $_SESSION['role'] = "user";
                // echo "Logged In";
                $_SESSION['email'] = $_POST['email'];
                header("location: ../../Resources/html/userdash.php");
            } else {
                echo "Incorrect password";
                header("location: ../../Resources/html/login.php");
            }
        } else {
            echo "isset error";
        }
    }
}
