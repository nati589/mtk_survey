<?php
include_once '../db/dbh.inc.php';

$first = mysqli_real_escape_string($conn, $_POST['firstname']);
$last = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$occupation = $_POST['occupation'];
$location = $_POST['location'];

$sql = "INSERT INTO `user` (`u_firstname`, `u_lastname`,`u_id`, `u_age`, `u_gender`, `u_occupation`, `u_email`, `u_password`, `u_profit`, `taken_survey`, `u_location`, `u_profilephoto`) VALUES ('$first ', '$last', NULL, '$age', '$gender', '$occupation', '$email', '$password', NULL, NULL, '$location', NULL);";
mysqli_query($conn, $sql);

header("Location: usersignup.php");
