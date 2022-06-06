<?php
include_once '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/redirect.php");
}
$id = mysqli_real_escape_string($conn, $_POST['survey']);
$_SESSION['survey'] = $id;
$sql = "SELECT * FROM survey WHERE s_id = '$id';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);

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
    <link rel="stylesheet" href="../css/formdisplay.css">
    <!-- <script src="../js/formgenerator.js"></script> -->
    <script src="../js/index.js"></script>
    <!-- <script src="../js/formgenerator.js"></script> -->
    <script src="../js/formdisplay.js"></script>
    <base href="../../index.php" target="_self">
    <title><?php
            echo $resultcheck[0];
            ?></title>
</head>

<body>
    <main>
        <section>
            <div id="form_page" class="example">
                <?php
                echo htmlspecialchars_decode($resultcheck[6]);
                ?>
            </div>
        </section>
    </main>
</body>

</html>