<?php
include '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/login.php");
}
if ($_SESSION['role'] != "admin") {
    header("location: ../../Resources/html/login.php");
}
$sql = "SELECT * FROM orgs WHERE o_email='';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);

$revqur = "SELECT SUM(filled_surveys) FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]');";
$revresult = mysqli_query($conn, $revqur);
$count = mysqli_fetch_row($revresult);
$revsavequr = "UPDATE orgs SET review_number='$count[0]' WHERE o_email=''";
mysqli_query($conn, $revsavequr);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admindash.css">
    <link rel="stylesheet" href="../css/orgdash.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
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
                    <a href="admindash.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="admin.php"><span class="las la-users"></span><span>Customers</span></a>
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
                Admin Dashboard
            </h2>

            <div class="user-wrapper">
                <?php
                if ($resultcheck[7] == '') {
                    echo '<img src="../images/userimg.png" width="40px" height="40px" alt="">';
                } else {
                    echo '<img src="uploaded-img/' . $resultcheck[7] . '" width="40px" height="40px" alt="">';
                }
                ?>
                <div>
                    <h4>
                        Admin
                    </h4>
                    <small>
                        admin@gmail.com
                    </small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $ucountqur = "SELECT * FROM user;";
                            $ucountresult = mysqli_query($conn, $ucountqur);
                            $ucountresultcheck = mysqli_num_rows($ucountresult);
                            echo mysqli_num_rows($ucountresult);
                            ?>
                        </h1>
                        <span>Users</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $ocountqur = "SELECT * FROM orgs;";
                            $ocountresult = mysqli_query($conn, $ocountqur);
                            $ocountresultcheck = mysqli_num_rows($ocountresult);
                            echo mysqli_num_rows($ocountresult);
                            ?>
                        </h1>
                        <span>Organizations</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $paycountqur = "SELECT * FROM taken_surveys WHERE s_state='1'";
                            $paycountresult = mysqli_query($conn, $paycountqur);
                            $ucountresultcheck = mysqli_num_rows($paycountresult);
                            echo (mysqli_num_rows($paycountresult) * 10) . " birr";
                            ?>
                        </h1>
                        <span>User Payment</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            echo (mysqli_num_rows($paycountresult) * 15) . " birr";
                            ?>
                        </h1>
                        <span>Profit</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Users</h3>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Employment</td>
                                            <td>Submissions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $querysurvey = "SELECT * FROM user ORDER BY u_id DESC LIMIT 10;";
                                        $queryresult = mysqli_query($conn, $querysurvey);
                                        $queryresultcheck = mysqli_num_rows($queryresult);
                                        if ($queryresultcheck > 0) {
                                            while ($row = mysqli_fetch_assoc($queryresult)) {
                                                echo "<tr>
                                                
                                            <td>" . $row['u_firstname'] . " " . $row['u_lastname'] . "</td>
                                            <td>" . $row['u_occupation'] . "</td>
                                            <td>" . $row['taken_survey'] . "</td>
                                       </tr>";
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Organizations</h3>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Survey</td>
                                            <td>Payment</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $querysurvey = "SELECT * FROM orgs ORDER BY o_id DESC LIMIT 10;";
                                        $queryresult = mysqli_query($conn, $querysurvey);
                                        $queryresultcheck = mysqli_num_rows($queryresult);
                                        if ($queryresultcheck > 0) {
                                            while ($row = mysqli_fetch_assoc($queryresult)) {
                                                echo "<tr><form action='showusers.php' method='POST'> 
                                                
                                            <td> " . $row['o_name'] . "</td>
                                            <td>" . $row['o_surveys'] . "</td>
                                            <td>" . $row['o_payment'] . "</td>
                                        </form></tr>";
                                            }
                                        }

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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").keypress(function() {
                $.ajax({
                    type: 'POST',
                    url: '../php/orgsearch.php',
                    data: {
                        name: $("#search").val(),
                    },
                    success: function(data) {
                        $("#output").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>