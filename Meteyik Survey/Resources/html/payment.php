<?php
include_once '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/login.php");
}
if ($_SESSION['role'] != "user") {
    header("location: ../../Resources/html/login.php");
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE u_email='$email';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);
if (isset($_POST['submit'])) {
    if (is_numeric($_POST['account']) && strlen($_POST['account']) == 13) {
        $account = mysqli_real_escape_string($conn, $_POST['account']);
        $qur = "INSERT INTO payment (`u_id`, `accountnumber`, `p_amount`, `p_state`) VALUES ('$resultcheck[2]', '" . $account . "', '$resultcheck[8]', '1');";
        mysqli_query($conn, $qur);
        $changeamount = "UPDATE user SET u_profit='0' WHERE u_id='$resultcheck[2]';";
        mysqli_query($conn, $changeamount);
        header("Location: ../../Resources/html/userdash.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="../css/showsurveyuser.css">
    <link rel="stylesheet" href="../css/payment.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <span class="las la-clipboard-list"></span><span>mtk Survey</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="userdash.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="showsurveysusers.php"><span class="las la-clipboard-list"></span><span>Surveys</span></a>
                </li>
                <li>
                    <a href="payment.php" class="active"><span class="las la-shopping-bag"></span><span>Collect Payment</span></a>
                </li>
                <li>
                    <a href="userprofile-update.php"><span class="las la-user-circle"></span><span>Profile</span></a>
                </li>
                <li>
                    <a href="../../Resources/php/logout.php"><span class="las la-clipboard-list"></span><span>Log Out</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Payment
            </h2>

            <div class="user-wrapper">
                <?php
                if ($resultcheck[10] == '') {
                    echo '<img src="../images/userimg.png" width="40px" height="40px" alt="">';
                } else {
                    echo '<img src="uploaded-img/' . $resultcheck[10] . '" width="40px" height="40px" alt="">';
                }
                ?>
                <div>
                    <h4>
                        <?php
                        echo "$resultcheck[0] $resultcheck[1]";
                        ?>
                    </h4>
                    <small>
                        <?php
                        echo "$resultcheck[6] ";
                        ?>
                    </small>
                </div>
            </div>
        </header>

        <main>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Payment</h3>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>CBE Account Number</td>
                                            <td>Amount</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        echo "<form method='POST' action=''>";
                                        ?>
                                        <tr>
                                            <?php
                                            if ($resultcheck[8] != 0) {
                                                echo "<td>" . $resultcheck[0] . " " . $resultcheck[1] . "</td>";
                                                echo "<td><input type='number' id='account' name='account' placeholder='Account Number' required>" . "</td>";
                                                echo "<td>" . $resultcheck[8] . "</td>";
                                            } else {
                                                echo "<td class='bold'>You must fill out surveys to get payment.</td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <?php
                                                if (!$resultcheck[8] == 0) {
                                                    echo "<input type='submit' value='Submit' name='submit' id='submit'>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        if (isset($_POST['submit'])) {
                                            if (!is_numeric($_POST['account']) || !(strlen($_POST['account']) == 13)) {

                                                echo "<tr>
                                                    <td class='invalid'>Invalid Account Number</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>";
                                            }
                                        }
                                        ?>
                                        <?php
                                        echo "</form>";
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function submitFilter() {
            document.getElementById('filtersurvey').submit();
        }
    </script>

</body>

</html>