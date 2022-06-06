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

            $sql = "INSERT INTO user(first_name, last_name, email, password) VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $password . "')";
            if ($conn->query($sql) === TRUE) {

            ?>
                <div class="message success">Account created</div>
<?php

            } else {

                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

if (isset(($_POST["email"])) && isset($_POST["delete"])) {
    $email = setup_input($_POST["email"]);
    deletetable('user', $email);
    header("Location: ../html/admindash.php?table=user");
}



?>