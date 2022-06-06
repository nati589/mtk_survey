<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: outfit;
    }
</style>

</html>
<?php
include('../../Resources/php/db.inc.php');
?>
<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>Number</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Net Pay</th>
        <th>Password</th>
        <th>Created at</th>
        <th>Review</th>
        <th>Profile Picture</th>

    </tr>
    <?php
    $org = displaytable('org');
    if ($org->num_rows > 0) {
        $sn = 1;
        while ($data = $org->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo $sn; ?> </td>
                <td><?php echo $data['id']; ?> </td>
                <td><?php echo $data['org_name']; ?> </td>
                <td><?php echo $data['email']; ?> </td>
                <td><?php echo $data['net_pay']; ?> </td>
                <td><?php echo $data['password']; ?> </td>
                <td><?php echo $data['survey_created']; ?> </td>
                <td><?php echo $data['user_review']; ?> </td>
                <td><?php echo $data['profile_photo']; ?> </td>
                <td>
                    <form method="POST" action="../../Resources/php/org_auth.php">
                        <input type="hidden" name="email" value="<?php echo $data['email']; ?>" required>
                        <input type="submit" name="delete" value="delete" class="btn">
                    </form>
                </td>
            <tr>
            <?php

            $sn++;
        }
    } else {

            ?>

            <tr>
                <td colspan="8">No data found</td>
            </tr>
        <?php
    }
        ?>
</table>

<form method="POST" action="../../Resources/php/org_auth.php">
    <label for="companyname">Company Name</label> <br>
    <input type="textarea" name="companyname" id="companyname" class="textbox" placeholder=" Company Name" required> <br>
    <label for="email">E-mail</label>
    <div class="btn">
        <input type="email" name="email" id="email" class="textbox" placeholder=" username@domain.com" required> <br>
    </div>
    <label for="password">Password</label>
    <div class="btn">
        <input type="password" name="password" id="password" class="textbox" placeholder=" Password" required> <br>
    </div>
    <label for="confirm">Confirm Password</label>
    <div class="btn">
        <input type="password" name="password" id="confirm" class="textbox" placeholder=" Confirm Password" required> <br>
    </div>
    <input type="checkbox" onclick="toggle()" id="showpassword"> Show Password
    <div>
        <input type="submit" name="signup" value="Sign Up" class="btn">

    </div>
</form>