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

        $sql = "INSERT INTO org(org_name, email, password) VALUES ('" . $cname . "', '" . $email . "', '" . $password . "')";
        if ($conn->query($sql) === TRUE) {

        ?>
            <div class="message success">Organization account created</div>
<?php

        } else {

            echo " Account not created";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "isset prob";
}

if (isset(($_POST["email"])) && isset($_POST["delete"])) {
    $email = setup_input($_POST["email"]);
    deletetable('org', $email);
    header("Location: ../html/admindash.php?table=org");
}


?>