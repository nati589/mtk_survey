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
        font-size: 1.2rem;
    }
</style>
<?php

include "db.inc.php";
include "validation.inc.php";



if (isset($_POST["companyname"]) && isset($_POST["email"]) && isset($_POST["password"])) {

    $cname = setup_input($_POST["companyname"]);
    $email = setup_input($_POST["email"]);
    $password = md5(setup_input($_POST["password"]));

    if (isUsed("email", $email, "org")) {
?>
        <div class="message error">Email already in use</div>
        <?php
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // $emailErr = "Invalid email format";
            header("Location: ../html/orgsignup.php?logincheck=1");
        }
        $sql = "INSERT INTO orgs(o_name, o_email, o_password, o_surveys, o_payment, review_number) VALUES ('" . $cname . "', '" . $email . "', '" . $password . "', '0', '0', '0')";
        if ($conn->query($sql) === TRUE) {
            if (isset($_POST['deleting'])) {
                header("Location: ../html/admin.php?table=" . $_POST['deleting'] . "");
            }
            header("Location: ../html/login.php");

        ?>
            <div class="message success">Organization account created</div>
<?php

        } else {
            header("Location: ../html/orgsignup.php?logincheck=1");
            echo " Account not created";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "isset prob";
}

if (isset(($_POST["email"])) && isset($_POST["delete"])) {
    $email = setup_input($_POST["email"]);
    deleteotable('orgs', $email);
    header("Location: ../html/admin.php?table=org");
}


?>