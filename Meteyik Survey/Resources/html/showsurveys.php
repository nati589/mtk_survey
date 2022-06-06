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
                    <a href="" class="active"><span class="las la-clipboard-list"></span><span>Surveys</span></a>
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
                Surveys
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
                            <h3>All Surveys</h3>
                            <form action="" method="POST" id="filtersurvey">
                                <select name="surveyfilter" id="surveyfilter" onchange="submitFilter();">
                                    <option value="Recent" <?php
                                                            if (isset($_POST['surveyfilter'])) {
                                                                if ($_POST['surveyfilter'] == "Recent") {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>>Most Recent</option>
                                    <option value="Oldest" <?php
                                                            if (isset($_POST['surveyfilter'])) {
                                                                if ($_POST['surveyfilter'] == "Oldest") {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>>Oldest First</option>
                                    <option value="highsub" <?php
                                                            if (isset($_POST['surveyfilter'])) {
                                                                if ($_POST['surveyfilter'] == "highsub") {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>>Most Submissions</option>
                                    <option value="lowsub" <?php
                                                            if (isset($_POST['surveyfilter'])) {
                                                                if ($_POST['surveyfilter'] == "lowsub") {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>>Least Submissions</option>
                                </select>
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
                                        if (isset($_POST['surveyfilter'])) {
                                            if ($_POST['surveyfilter'] == "Recent") {
                                                $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') ORDER BY s_id DESC;";
                                            } elseif ($_POST['surveyfilter'] == "Oldest") {
                                                $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') ORDER BY s_id;";
                                            } elseif ($_POST['surveyfilter'] == "highsub") {
                                                $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') ORDER BY filled_surveys DESC;";
                                            } else {
                                                $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') ORDER BY filled_surveys;";
                                            }
                                        } else {
                                            $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') ORDER BY s_id DESC;";
                                        }
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