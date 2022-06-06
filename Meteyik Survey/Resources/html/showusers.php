<?php
include '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/orglogin.php");
}
$email = $_SESSION['email'];
if (isset($_POST['survey'])) {
    $_SESSION['survey'] = $_POST['survey'];
}
$sql = "SELECT * FROM orgs WHERE o_email='$email';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="../css/showsurvey.css">
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
                    <a href="orgdash.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
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
                <?php
                $namequr = "SELECT * FROM survey WHERE s_id='" . $_SESSION['survey'] . "';";
                $nameresult = mysqli_query($conn, $namequr);
                $nameresultcheck = mysqli_fetch_row($nameresult);
                echo $nameresultcheck[0];
                ?>
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

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
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3><?php
                                echo $nameresultcheck[0];
                                ?></h3>
                            <form action="" method="POST" id="filterusers">
                                <select name="userfilter" id="userfilter">
                                    <option value="20" onclick="submitFilter();" <?php
                                                                                    if (isset($_POST['userfilter'])) {
                                                                                        if ($_POST['userfilter'] == "20") {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>20 entries</option>
                                    <option value="40" onclick="submitFilter();" <?php
                                                                                    if (isset($_POST['userfilter'])) {
                                                                                        if ($_POST['userfilter'] == "40") {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>40 entries</option>
                                    <option value="100" onclick="submitFilter();" <?php
                                                                                    if (isset($_POST['userfilter'])) {
                                                                                        if ($_POST['userfilter'] == "100") {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>100 entries</option>
                                    <option value=" " onclick="submitFilter();" <?php
                                                                                if (isset($_POST['userfilter'])) {
                                                                                    if ($_POST['userfilter'] == " ") {
                                                                                        echo "selected";
                                                                                    }
                                                                                }
                                                                                ?>>All entries</option>
                                </select>
                            </form>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Occupation</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['userfilter'])) {
                                            if ($_POST['userfilter'] == "20") {
                                                $querysurvey = "SELECT u.u_firstname, u.u_lastname, u.u_occupation, u.u_id, ts.s_state 
                                                FROM user u
                                                INNER JOIN taken_surveys ts
                                                ON ts.u_id = u.u_id
                                                WHERE ts.s_id
                                                IN (SELECT so.s_id 
                                                    FROM survey_owner so 
                                                    WHERE so.o_id='$resultcheck[1]' 
                                                    AND so.s_id='" . $_SESSION['survey'] . "') ORDER BY ts.s_id DESC LIMIT 20;
                                                ";
                                            } elseif ($_POST['userfilter'] == "40") {
                                                $querysurvey = "SELECT u.u_firstname, u.u_lastname, u.u_occupation, u.u_id, ts.s_state 
                                                FROM user u
                                                INNER JOIN taken_surveys ts
                                                ON ts.u_id = u.u_id
                                                WHERE ts.s_id
                                                IN (SELECT so.s_id 
                                                    FROM survey_owner so 
                                                    WHERE so.o_id='$resultcheck[1]' 
                                                    AND so.s_id='" . $_SESSION['survey'] . "') ORDER BY ts.s_id DESC LIMIT 40;";
                                            } elseif ($_POST['userfilter'] == "100") {
                                                $querysurvey = "SELECT u.u_firstname, u.u_lastname, u.u_occupation, u.u_id, ts.s_state 
                                                FROM user u
                                                INNER JOIN taken_surveys ts
                                                ON ts.u_id = u.u_id
                                                WHERE ts.s_id
                                                IN (SELECT so.s_id 
                                                    FROM survey_owner so 
                                                    WHERE so.o_id='$resultcheck[1]' 
                                                    AND so.s_id='" . $_SESSION['survey'] . "') ORDER BY ts.s_id DESC LIMIT 100;";
                                            } else {
                                                $querysurvey = "SELECT u.u_firstname, u.u_lastname, u.u_occupation, u.u_id, ts.s_state 
                                                FROM user u
                                                INNER JOIN taken_surveys ts
                                                ON ts.u_id = u.u_id
                                                WHERE ts.s_id
                                                IN (SELECT so.s_id 
                                                    FROM survey_owner so 
                                                    WHERE so.o_id='$resultcheck[1]' 
                                                    AND so.s_id='" . $_SESSION['survey'] . "') ORDER BY ts.s_id DESC;";
                                            }
                                        } else {
                                            $querysurvey = "SELECT u.u_firstname, u.u_lastname, u.u_occupation, u.u_id, ts.s_state 
                                            FROM user u
                                            INNER JOIN taken_surveys ts
                                            ON ts.u_id = u.u_id
                                            WHERE ts.s_id
                                            IN (SELECT so.s_id 
                                                FROM survey_owner so 
                                                WHERE so.o_id='$resultcheck[1]' 
                                                AND so.s_id='" . $_SESSION['survey'] . "') ORDER BY ts.s_id DESC LIMIT 20;";
                                        }
                                        $queryresult = mysqli_query($conn, $querysurvey);
                                        $queryresultcheck = mysqli_num_rows($queryresult);
                                        if ($queryresultcheck > 0) {
                                            while ($row = mysqli_fetch_assoc($queryresult)) {
                                                echo "<tr><form action='userstatistics.php' method='POST'> 
                                                <input type='hidden' value='" . $row['u_id'] . "' name='userid'>
                                                
                                            <td> <input type='submit' name='submit' value='" . $row['u_firstname'] . " " . $row['u_lastname'] . "'></td>
                                            <td>" . $row['u_occupation'] . "</td>
                                            <td></td>
                                        </form></tr>
                                        ";
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
    <script>
        function submitFilter() {
            document.getElementById('filterusers').submit();
        }
    </script>

</body>

</html>