<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'biguser') {
    // echo $_SESSION['role'];
    header("location: ../../Resources/html/orgdash.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Natan Mekebib">
    <meta name="description" content="Fill out surveys get rewards">
    <meta name="keywords" content="Survey Form Research meteyik mtk Rewards user signup">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account : Login</title>
    <link rel="shortcut icon" href="Resources/logo.png">
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/signup.js"></script>
    <base href="../../index.php" target="_self">

</head>

<body>
    <section>
        <div id="container">
            <div id="right-card" class="card">
                <div>
                    <h1>Organizational Login</h1>
                    <p>Welcome back fellow surveyee! </p>
                </div>
                <div>
                    <form method="post" action="Resources/php/orglog.php">
                        <label for="email">E-mail</label>
                        <div class="btn">
                            <input type="email" name="email" id="email" class="textbox" placeholder="username@domain.com" required> <br>
                        </div>
                        <label for="password">Password</label>
                        <div class="btn">
                            <input type="password" name="password" id="password" class="textbox" placeholder=" Password" required> <br>
                        </div>
                        <input type="checkbox" onclick="toggle()" id="showpassword"> Show Password
                        <div>
                            <input type="submit" name="login" value="Login" class="btn">

                        </div>
                    </form>
                    <p>
                        Don't have an account? Sign Up
                        <a href="Resources/html/usersignup.php">
                            User Account
                        </a>
                        <br>
                        <a href="Resources/html/orgsignup.php">
                            Organization Account
                        </a>
                        <br>
                        <a href="Resources/html/orglogin.php">
                            Organization Account Log in
                        </a>
                    </p>

                </div>
                <div id="logo">
                    <a href="#">
                        mtk&reg;
                    </a>
                </div>
                <p>
                    &copy; መጠይቅ Survey 2022
                </p>
            </div>
        </div>
    </section>

</body>

</html>