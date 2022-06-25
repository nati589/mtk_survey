<style>
    .message {
        margin: 20rem auto;
        width: 20rem;
        font-size: 1.4rem;
        padding: 0.5rem 0;
        text-align: center;
        border-radius: 0.4rem;
    }

    .error {
        border: 2px solid #cc3434;
        color: #cc3434;
    }

    .success {
        border: 2px solid #45cc45;
        color: #45cc45;
    }
</style>
<?php

include "db.inc.php";
include "validation.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset(($_POST["firstname"])) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"])) {

        $fname = setup_input($_POST["firstname"]);
        $lname = setup_input($_POST["lastname"]);
        $email = setup_input($_POST["email"]);
        $password = md5(setup_input($_POST["password"]));

        if (isUsed("email", $email, "user")) {
?>
            <div class="message error">Email already in use</div>
            <?php
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // $emailErr = "Invalid email format";
                header("Location: ../html/usersignup.php?logincheck=1");
            }
            $sql = "INSERT INTO user(u_firstname, u_lastname, u_email, u_password, u_age, u_occupation, u_gender, u_profit,taken_survey) VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $password . "', '', '','', '0', '0')";
            if ($conn->query($sql) === TRUE) {
                if (isset($_POST['deleting'])) {
                    header("Location: ../html/admin.php?table=" . $_POST['deleting'] . "");
                }
                header("Location: ../html/login.php");

            ?>
                <!-- <div class="message success">Account created</div> -->
<?php

            } else {

                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

if (isset(($_POST["email"])) && isset($_POST["delete"])) {

    $email = setup_input($_POST["email"]);

    deleteutable('user', $email);
    header("Location: ../html/admin.php");
}



?>