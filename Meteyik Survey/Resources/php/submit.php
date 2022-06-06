<?php
include_once 'db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/userlogin.php");
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE u_email='$email';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);

$querysurvey = "SELECT * FROM survey WHERE s_id='" . $_SESSION['survey'] . "';";
$queryresult = mysqli_query($conn, $querysurvey);
$queryresultcheck = mysqli_fetch_row($queryresult);

$obj = htmlspecialchars_decode($queryresultcheck[7]);
$objJson = json_decode($obj);
foreach ($_POST as $x => $x_value) {
    if (!is_array($x_value)) {
        if ($objJson->$x->q_type == "1") {
            $objJson->$x->answer = $x_value;
        } else {
            if (is_array($objJson->$x->options)) {
                ($objJson->$x->options)[$x_value]->selected = 1;
            }
        }
    } else {
        foreach ($x_value as $y => $y_value) {
            ($objJson->$x->options)[$y_value]->selected = 1;
        }
    }
}
$saveJSON = htmlspecialchars(json_encode($objJson));
$savequery = "INSERT INTO taken_surveys(s_id, u_id, u_input, s_state) VALUES ('" . $_SESSION['survey'] . "', '" . $resultcheck[2] . "', '" . $saveJSON . "', '1');";
mysqli_query($conn, $savequery);

$resultcheck[8] += 10;
$resultcheck[9] += 1;
$saveuser = "UPDATE user SET u_profit='" . $resultcheck[8] . "', taken_survey='" . $resultcheck[9] . "' WHERE u_id='" . $resultcheck[2] . "';";
mysqli_query($conn, $saveuser);

$queryresultcheck[8] += 1;
$savesurveydata = "UPDATE survey SET filled_surveys='" . $queryresultcheck[8] . "' WHERE s_id='" . $queryresultcheck[2] . "';";
mysqli_query($conn, $savesurveydata);

unset($_SESSION['survey']);

header("Location: ../html/userdash.php");
