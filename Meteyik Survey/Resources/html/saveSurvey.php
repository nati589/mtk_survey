<?php
include_once '../php/db.inc.php';
session_start();

// $first = mysqli_real_escape_string($conn, $_POST['firstname']);
$name = htmlspecialchars($_POST['name']);
$namecheck = "SELECT s_name FROM `survey` WHERE s_name='$name'; ";
$output = mysqli_query($conn, $namecheck);
$output_check = mysqli_num_rows($output);
if ($output_check > 0) {
    $namechange = "SELECT MAX(s_id) as max_id FROM survey;";
    $add = mysqli_query($conn, $namechange);
    while ($row = mysqli_fetch_assoc($add)) {
        $name = $name . "(" . $row['max_id'] . ")";
    }
}
$desc = htmlspecialchars($_POST['desc']);
$age = $_POST['age'];
$gender = $_POST['gender'];
$occupation = $_POST['occup'];
$questions = htmlspecialchars($_POST['questions']);
$content = htmlspecialchars($_POST['content']);

$sql = "INSERT INTO `survey` (`s_name`, `s_description`, `s_occupation`, `s_age`, `s_gender`, `s_content`, `s_questions`, `filled_surveys`) VALUES ('$name', '$desc', '$occupation', '$age', '$gender', '$content', '$questions', NULL)";

mysqli_query($conn, $sql);

$getid = "SELECT s_id FROM survey WHERE s_name='$name';";
$id = mysqli_query($conn, $getid);
$idcheck = mysqli_fetch_row($id);

$email = $_SESSION['email'];
$getorgid = "SELECT o_id FROM orgs WHERE o_email='$email';";
$orgid = mysqli_query($conn, $getorgid);
$orgidcheck = mysqli_fetch_row($orgid);

$qur = "INSERT INTO `survey_owner` (`s_id`, `o_id`, `state`) VALUES ('$idcheck[0]', '$orgidcheck[0]', '1');";
mysqli_query($conn, $qur);

$orgdata = "SELECT * FROM orgs WHERE o_email='$email';";
$orgqur = mysqli_query($conn, $orgdata);
$orgqurcheck = mysqli_fetch_row($orgqur);
$orgqurcheck[4] += 1;
$editorg = "UPDATE orgs SET o_surveys='$orgqurcheck[4]' WHERE o_id='$orgqurcheck[1]'";
mysqli_query($conn, $editorg);

header("Location: orgdash.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo $idcheck[0];
    ?>
</body>

</html>