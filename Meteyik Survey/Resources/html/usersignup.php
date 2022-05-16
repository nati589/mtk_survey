<?php
include_once '../db/dbh.inc.php';
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
    <title>User Account : Sign Up</title>
    <link rel="shortcut icon" href="Resources/logo.png">
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/signup.css">
    <script src="../js/signup.js"></script>
    <base href="../../index.php" target="_self">
</head>

<body>
    <?php

    // $qur = "select * from user;";
    // $result = mysqli_query($conn, $qur);
    // $result_check = mysqli_num_rows($result);

    // if ($result_check > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo $row['u_lastname'];
    //     }
    // }
    // echo $first = $_POST['firstname'];


    // if (!isset($_POST['signup'])) {
    //     echo "you not connect";
    // } 
    // else {
    //     $first = $_POST['firstname'];
    //     $last = $_POST['lastname'];
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     $age = $_POST['age'];
    //     $gender = $_POST['gender'];
    //     $occupation = $_POST['occupation'];
    //     $location = $_POST['location'];

    //     $sql = "INSERT INTO `user` (`u_firstname`, `u_lastname`,`u_id`, `u_age`, `u_gender`, `u_occupation`, `u_email`, `u_password`, `u_profit`, `taken_survey`, `u_location`, `u_profilephoto`) VALUES ('$first ', '$last', NULL, '$age', '$gender', '$occupation', '$email', '$password', NULL, NULL, '$location', NULL);";
    //     mysqli_query($conn, $sql);
    // }
    ?>
    <section>
        <div id="container">
            <div id="right-card" class="card">
                <div>
                    <h1>User Account Sign Up</h1>
                    <p>Welcome to our community fellow surveyee! </p>
                </div>
                <div>
                    <form action="Resources/html/userregister.php" method="POST">
                        <label for="firstname">First Name</label> <br>
                        <div class="btn">
                            <input required type="textarea" name="firstname" id="firstname" class="textbox" placeholder=" First Name" required> <br>
                        </div>
                        <label for="lastname">Last Name</label> <br>
                        <div class="btn">
                            <input required type="textarea" name="lastname" id="lastname" class="textbox" placeholder=" Last Name" required> <br>
                        </div>
                        <label for="email">E-mail</label>
                        <div class="btn">
                            <input type="email" required name="email" id="email" class="textbox" placeholder=" username@domain.com" required> <br>
                        </div>
                        <label for="password">Password</label>
                        <div class="btn">
                            <input type="password" required name="password" id="password" class="textbox" placeholder=" Password" required> <br>
                        </div>
                        <label for="confirm">Confirm Password</label>
                        <div class="btn">
                            <input type="password" required name="password" id="confirm" class="textbox" placeholder=" Confirm Password" required> <br>
                        </div>
                        <input type="checkbox" onclick="toggle()" id="showpassword"> Show Password <br>
                        <label for="age">Age </label>
                        <select name="age" id="age" size="1" required>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                        </select> <br>
                        <label for="gender">Gender </label>
                        <select name="gender" id="gender" size="1" required>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select> <br>
                        <label for="occupation">Occupation </label>
                        <select name="occupation" id="occupation" size="1" required>
                            <option value="unemployed">Unemployed</option>
                            <option value="engineer">Engineer</option>
                            <option value="medicine">Medical Professional</option>
                            <option value="it">IT expert</option>
                            <option value="artist">Artist</option>
                        </select> <br>
                        <label for="location">Location </label>
                        <select name="location" id="location" size="1" required>
                            <option value="Africa">Africa</option>
                            <option value="Asia">Asia</option>
                            <option value="North America">North America</option>
                            <option value="South America">South America</option>
                            <option value="Europe">Europe</option>
                        </select> <br>
                        <div>
                            <input type="submit" name="signup" value="Sign Up" class="btn">

                        </div>
                    </form>
                    <p>
                        Click here for
                        <a href="Resources/html/orgsignup.html">
                            Organization account
                        </a>
                    </p>
                    <p>
                        Already have an account?
                        <a href="Resources/html/login.html">
                            Login
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