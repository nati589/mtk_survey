<?php

require "db.inc.php";
require "validation.inc.php";

session_start();
if (isset($_SESSION['role'])) {
    echo $_SESSION['role'];
    header("location: ../html/orgdash.php");
}
// isset($_POST["email"]) && isset($_POST["password"])

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["email"] == "admin@gmail.com" && ($_POST["password"]) == "iamadmin") {

        $_SESSION['role'] = "admin";
        header("location: ../html/admindash.php");
    } else {
        if (isset($_POST["email"]) && isset($_POST["password"])) {

            $email = setup_input($_POST["email"]);
            $password = md5(setup_input($_POST["password"]));

            $sql = "SELECT o_email FROM orgs WHERE o_email = '" . $email . "' and o_password = '" . $password . "'";
            $result = $conn->query($sql);

            $result_count = $result->num_rows;

            if ($result_count > 0) {
                $_SESSION['role'] = "biguser";
                // echo "Logged In";
                $_SESSION['email'] = $_POST['email'];
                header("location: ../html/orgdash.php");
            } else {
                // echo "Incorrect password";
                header("location: ../html/orglogin.php");
            }
        } else {
            echo "isset error";
            header("location: ../html/orglogin.php");
        }
    }
}
