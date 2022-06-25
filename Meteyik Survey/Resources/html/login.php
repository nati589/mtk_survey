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
                    <h1>Login</h1>
                    <p>Welcome back fellow surveyee! </p>
                </div>
                <div>
                    <form method="post" action="Resources/php/login.php">
                        <label for="email">E-mail</label>
                        <div class="btn">
                            <input type="email" name="email" id="email" class="textbox" placeholder="username@domain.com" required> <br>
                        </div>
                        <label for="password">Password</label>
                        <div class="btn">
                            <input type="password" name="password" id="password" class="textbox" placeholder=" Password" required> <br>
                        </div>
                        <input type="checkbox" onclick="toggle()" id="showpassword"> Show Password
                        <br>
                        <div class="roles">

                            <input type="radio" name="role" value="User" required>
                            <label for="User">User</label> <br>
                            <input type="radio" name="role" value="Organization" required>
                            <label for="Organization">Orgs</label>
                        </div>
                        <div>
                            <input type="submit" name="login" value="Login" class="btn">

                        </div>
                    </form>
                    <?php
                    if (isset($_GET['logincheck'])) {
                        echo "<div class='error'>Invalid information entered</div>";
                    }
                    ?>
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