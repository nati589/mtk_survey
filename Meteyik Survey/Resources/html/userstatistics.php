<?php
include_once '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/orglogin.php");
}
if ($_SESSION['role'] != "biguser") {
    header("location: ../../Resources/html/orglogin.php");
}
$s_id = $_SESSION['survey'];
if (isset($_GET['uid'])) {
    $_SESSION['u_id'] = $_GET['uid'];
}
if (isset($_POST['report'])) {
    $qur = "UPDATE taken_surveys SET s_state='7' WHERE u_id='" . $_SESSION['u_id'] . "' AND s_id='$s_id'";
    mysqli_query($conn, $qur);
    header("location: ../../Resources/html/orgdash.php");
}
$sql = "SELECT * FROM taken_surveys WHERE s_id='$s_id' AND u_id='" . $_SESSION['u_id'] . "';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);

$userdata = json_decode(htmlspecialchars_decode($resultcheck[2]));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="keywords" content="Survey Form Research meteyik mtk Rewards Ethiopia User Form">
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <meta name="description" content="Fill out surveys get rewards">
    <meta name="author" content="Natan Mekebib">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/userstatistics.css">
    <!-- <script src="../js/formgenerator.js"></script> -->
    <script src="../js/index.js"></script>
    <!-- <script src="../js/formgenerator.js"></script> -->
    <script src="../js/formdisplay.js"></script>
    <title>User Data</title>
</head>

<body>
    <main>
        <section>

            <div id="form_page" class="example">
                <div class="title">
                    <?php
                    $surveytitle = "SELECT * FROM survey WHERE s_id='$s_id';";
                    $surveytitleresult = mysqli_fetch_row(mysqli_query($conn, $surveytitle));
                    echo $surveytitleresult[0];
                    ?>
                </div>
                <?php
                foreach ($userdata as $x => $x_value) {
                    if ($x_value->q_type == "1") {
                        echo "<div class='question'><div class='content'><span>" . $x_value->q_number . "</span>";
                        echo $x_value->q_content . "</div>";
                        echo "<div class='answer'>" . $x_value->answer . "</div></div>";
                    } elseif ($x_value->q_type == "2" || $x_value->q_type == "3") {
                        echo "<div class='question'><div class='content'><span>" . $x_value->q_number . "</span>";
                        echo $x_value->q_content . "</div>";
                        foreach ($x_value->options as $y) {
                            if ($y->selected == "1") {
                                echo "<div class='answer'>" . $y->content . "</div>";
                            }
                        }
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </section>
        <section>
            <div>
                <a href="showsurveys.php">Go Back</a>
            </div>
        </section>
        <div class="report">
            <form action="" method="POST">
                <label for="">Report user for misconduct?</label> <br>
                <input type='submit' name='report' value='Report'>
            </form>
        </div>
    </main>
</body>

</html>