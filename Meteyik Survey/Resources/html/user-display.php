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
        <th>lastname</th>
        <th>firstname</th>
        <th>id</th>
        <th>age</th>
        <th>gender</th>
        <th>occupation</th>
        <th>email</th>
        <th>password</th>
        <th>profit</th>
        <th>surveystaken</th>
        <th>profilephoto</th>

    </tr>
    <?php
    $users = displaytable('user');
    if ($users->num_rows > 0) {
        $sn = 1;
        while ($data = $users->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo $sn; ?> </td>
                <td><?php echo $data['last_name']; ?> </td>
                <td><?php echo $data['first_name']; ?> </td>
                <td><?php echo $data['id']; ?> </td>
                <td><?php echo $data['age']; ?> </td>
                <td><?php echo $data['gender']; ?> </td>
                <td><?php echo $data['occupation']; ?> </td>
                <td><?php echo $data['email']; ?> </td>
                <td><?php echo $data['password']; ?> </td>
                <td><?php echo $data['profit']; ?> </td>
                <td><?php echo $data['surveystaken']; ?> </td>
                <td><?php echo $data['profilephoto']; ?> </td>
                <td>
                    <form method="POST" action="../../Resources/php/auth.php">
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

<html>

<body>
    add an account
    <form method="POST" action="../../Resources/php/auth.php">
        <label for="firstname">First Name</label> <br>
        <input type="textarea" name="firstname" id="firstname" class="textbox" placeholder=" First Name" required> <br>
        <label for="lastname">Last Name</label> <br>
        <input type="textarea" name="lastname" id="lastname" class="textbox" placeholder=" Last Name" required> <br>
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
</body>

</html>