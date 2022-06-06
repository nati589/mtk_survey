<?php
include '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/orglogin.php");
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM orgs WHERE o_email='$email';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);

$revqur = "SELECT SUM(filled_surveys) FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]');";
$revresult = mysqli_query($conn, $revqur);
$count = mysqli_fetch_row($revresult);
$revsavequr = "UPDATE orgs SET review_number='$count[0]' WHERE o_email='$email'";
mysqli_query($conn, $revsavequr);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
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
                    <a href="" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-users"></span><span>Customers</span></a>
                </li>
                <li>
                    <a href="showsurveys.php"><span class="las la-clipboard-list"></span><span>Surveys</span></a>
                </li>
                <li>
                    <a href="form.php"><span class="las la-shopping-bag"></span><span>Create +</span></a>
                </li>
                <li>
                    <a href="orgprofile-update.php"><span class="las la-user-circle"></span><span>Profile</span></a>
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
                Dashboard
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
                        <?php
                        echo "$resultcheck[0] ";

                        ?>
                    </h4>
                    <small>
                        <?php
                        echo "$resultcheck[2] ";
                        ?>
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
                            echo "$resultcheck[6] ";
                            ?>
                        </h1>
                        <span>Total Submissions</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            echo "$resultcheck[4] ";
                            ?>
                        </h1>
                        <span>Surveys</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            echo "$resultcheck[5] birr";
                            ?>
                        </h1>
                        <span>Payment</span>
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
                            <h3>Recent Surveys</h3>
                            <form action="showsurveys.php">
                                <button>
                                    See all <span class="las la-arrow-right"></span>
                                </button>
                            </form>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Survey Title</td>
                                            <td>Description</td>
                                            <td>Submissions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') ORDER BY s_id DESC LIMIT 8;";
                                        $queryresult = mysqli_query($conn, $querysurvey);
                                        $queryresultcheck = mysqli_num_rows($queryresult);
                                        if ($queryresultcheck > 0) {
                                            while ($row = mysqli_fetch_assoc($queryresult)) {
                                                echo "<tr><form action='showusers.php' method='POST'> 
                                                <input type='hidden' value='" . $row['s_id'] . "' name='survey'>
                                                
                                            <td> <input type='submit' name='submit' value='" . $row['s_name'] . "'></td>
                                            <td>" . $row['s_description'] . "</td>
                                            <td>" . $row['filled_surveys'] . "</td>
                                        </form></tr>
                                        <tr>
                                        <td style='display:none;'>ldsfkjflj</td>
                                        <td style='display:none;'>ldsfkjflj</td><td style='display:none;'>ldsfkjflj</td>
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

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New submissions</h3>
                        </div>

                        <div class="card-body">
                            <?php
                            $subquery = "SELECT u.u_id userid,u.u_firstname,u.u_lastname,u.u_occupation, u.u_profilephoto, ts.s_id surveyid 
                            FROM taken_surveys ts 
                            INNER JOIN user u 
                            ON u.u_id = ts.u_id WHERE ts.s_id 
                                IN (SELECT tt.s_id FROM taken_surveys tt WHERE tt.s_id IN (SELECT so.s_id FROM survey_owner so 
                                    WHERE so.o_id='" . $resultcheck[1] . "'))
                                    ORDER BY u.u_id LIMIT 7; 
                                ";
                            $subqueryresult = mysqli_query($conn, $subquery);
                            $subqueryresultcheck = mysqli_num_rows($subqueryresult);
                            if ($subqueryresultcheck > 0) {
                                while ($srow = mysqli_fetch_assoc($subqueryresult)) {
                                    echo '<div class="customer">
                                <div class="info">';
                                    if ($srow['u_profilephoto'] == '') {
                                        echo '<img src="../images/userimg.png" width="40px" height="40px" alt="">';
                                    } else {
                                        echo '<img src="uploaded-img/' . $srow['u_profilephoto'] . '" width="40px" height="40px" alt="">';
                                    }
                                    echo '<div>
                                        <h4>' . $srow["u_firstname"] . " " . $srow["u_lastname"] . '</h4>
                                        <small>' . $srow["u_occupation"] . '</small>
                                    </div>
                                </div>
                            </div>';
                                }
                            }
                            ?>

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