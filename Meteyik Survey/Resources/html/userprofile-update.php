<?php

include '../php/db.inc.php';
session_start();
$email = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE u_email='$email';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);

if (isset($_POST['update_profile'])) {

    $update_fname = mysqli_real_escape_string($conn, $_POST['update_fname']);
    if (empty($update_fname)) {
        $update_fname = $resultcheck[0];
    }
    $update_lname = mysqli_real_escape_string($conn, $_POST['update_lname']);
    if (empty($update_lname)) {
        $update_lname = $resultcheck[1];
    }
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    if (empty($update_email)) {
        $update_email = $resultcheck[6];
    }

    mysqli_query($conn, "UPDATE `user` SET u_firstname = '$update_fname', u_lastname = '$update_lname', u_email = '$update_email' WHERE u_id = '$resultcheck[2]'") or die('query failed');

    $old_pass = $_POST['old_pass'];
    $update_pass = md5(mysqli_real_escape_string($conn, $_POST['update_pass']));
    $new_pass = md5(mysqli_real_escape_string($conn, $_POST['new_pass']));
    $confirm_pass = md5(mysqli_real_escape_string($conn, $_POST['confirm_pass']));

    if (!($update_pass == "d41d8cd98f00b204e9800998ecf8427e" || $new_pass == "d41d8cd98f00b204e9800998ecf8427e" || $confirm_pass == "d41d8cd98f00b204e9800998ecf8427e")) {
        if ($update_pass != $old_pass) {
            $message[] = 'old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "UPDATE `user` SET u_password = '$confirm_pass' WHERE u_id = '$resultcheck[2]'") or die('query failed');
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'C:\xampp\htdocs\Meteyik Survey\Resources\html\uploaded-img/' . $resultcheck[2] . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            if (!file_exists($resultcheck[2] . $update_image)) {
                $image_update_query = mysqli_query($conn, "UPDATE `user` SET u_profilephoto = '$resultcheck[2]$update_image' WHERE u_id = '$resultcheck[2]'") or die('query failed');
            } else {
                $image_update_query = mysqli_query($conn, "UPDATE `user` SET u_profilephoto = '$update_image' WHERE u_id = '$resultcheck[2]'") or die('query failed');
            }
            if ($image_update_query) {
                if (!file_exists($resultcheck[2] . $update_image)) {
                    move_uploaded_file($update_image_tmp_name, $update_image_folder);
                }
            }
        }
    }
    $update_occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    if (!empty($update_occupation)) {
        $occupation_update_query = mysqli_query($conn, "UPDATE `user` SET u_occupation = '$update_occupation' WHERE u_id = '$resultcheck[2]'") or die('query failed');
    }
    $update_gender = mysqli_real_escape_string($conn, $_POST['gender']);
    if (!empty($update_gender)) {
        $gender_update_query = mysqli_query($conn, "UPDATE `user` SET u_gender = '$update_gender' WHERE u_id = '$resultcheck[2]'") or die('query failed');
    }
    $update_age = mysqli_real_escape_string($conn, $_POST['age']);
    if (!empty($update_age)) {
        $age_update_query = mysqli_query($conn, "UPDATE `user` SET u_age = '$update_age' WHERE u_id = '$resultcheck[2]'") or die('query failed');
    }
    if (empty($message)) {
        header("location: ../../Resources/html/userdash.php");
    }
}
if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update profile</title>

    <link rel="stylesheet" href="../css/profile.css">

</head>

<body>
    <div class="update-profile">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($resultcheck[10] == '') {
                echo '<img src="../images/userimg.png">';
            } else {
                echo '<img src="uploaded-img/' . $resultcheck[10] . '" width="200px">';
            }
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>First Name :</span>
                    <?php
                    echo "<input type='text' name='update_fname' value='$resultcheck[0]' class='box'>";
                    ?>
                    <span>Last Name :</span>
                    <?php
                    echo "<input type='text' name='update_lname' value='$resultcheck[1]' class='box'>";
                    ?>
                    <span>Your email :</span>
                    <?php
                    echo "<input type='email' name='update_email' value='$resultcheck[6]' class='box'>";
                    ?>
                    <span>Update your profile picture :</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                    <span>Gender : </span>
                    <select name="gender" id="gender" size="1" class="box">
                        <option value="" selected>Rather not say</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="inputBox">
                    <?php
                    echo "<input type='hidden' name='old_pass' value='$resultcheck[7]' class='box'>";
                    ?>
                    <span>Old password :</span>
                    <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
                    <span>New password :</span>
                    <input type="password" name="new_pass" placeholder="Enter new password" class="box">
                    <span>Confirm password :</span>
                    <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
                    <span>Occupation :</span>
                    <select name="occupation" id="occupation" size="1" class="box">
                        <option value="" selected>-</option>
                        <option value="Unemployed">Unemployed</option>
                        <option value="Engineer">Engineer</option>
                        <option value="Medicine">Medical Professional</option>
                        <option value="It">IT expert</option>
                        <option value="Artist">Artist</option>
                    </select>
                    <span>Age :</span>
                    <?php
                    echo "<input type='number' name='age' value='$resultcheck[3]' class='box'>";
                    ?>
                </div>

            </div>
            <input type="submit" value="Update profile" name="update_profile" class="btn">
            <a href="userdash.php" class="delete-btn">Go back</a>
        </form>

    </div>

</body>

</html>