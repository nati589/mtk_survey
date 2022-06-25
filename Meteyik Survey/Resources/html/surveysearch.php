<?php
include '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/orglogin.php");
}
if ($_SESSION['role'] != "biguser") {
    header("location: ../../Resources/html/orglogin.php");
}
if (isset($_POST['search'])) {
    $search = $_POST['search'];
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
                    <a href="showsurveys.php" class="active"><span class="las la-clipboard-list"></span><span>Surveys</span></a>
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
                <form action="" method="POST">
                    <input name="search" type="search" placeholder="Search here" />
                </form>
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
                                    <option value="Ascending" <?php
                                                                if (isset($_POST['surveyfilter'])) {
                                                                    if ($_POST['surveyfilter'] == "Ascending") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?>>Ascending</option>
                                    <option value="Descending" <?php
                                                                if (isset($_POST['surveyfilter'])) {
                                                                    if ($_POST['surveyfilter'] == "Descending") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?>>Descending</option>
                                </select>
                                <input type="hidden" name="search" value="<?php echo $_POST['search']; ?>">
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
                                        if (isset($_POST['search'])) {

                                            if (isset($_POST['surveyfilter'])) {
                                                if ($_POST['surveyfilter'] == "Ascending") {
                                                    $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') AND s_name LIKE '%" . $search . "%' ORDER BY s_id;";
                                                } elseif ($_POST['surveyfilter'] == "Descending") {
                                                    $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') AND s_name LIKE '%" . $search . "%' ORDER BY s_id DESC;";
                                                }
                                            } else {
                                                $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') AND s_name LIKE '%" . $_POST['search'] . "%' ORDER BY s_id;";
                                            }
                                        } else {
                                            $querysurvey = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$resultcheck[1]') ORDER BY s_id;";
                                        }
                                        $queryresult = mysqli_query($conn, $querysurvey);
                                        $queryresultcheck = mysqli_num_rows($queryresult);
                                        if ($queryresultcheck > 0) {
                                            while ($row = mysqli_fetch_assoc($queryresult)) {
                                                echo "<tr>
                                            <td><a href='showusers.php?id=" . $row['s_id'] . "'>" . $row['s_name'] . "</a></td>
                                            <td>" . $row['s_description'] . "</td>
                                            <td>" . $row['filled_surveys'] . "</td>
                                        </tr>
                                        <tr>";
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