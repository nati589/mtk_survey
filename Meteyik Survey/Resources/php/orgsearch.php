<?php

include 'db.inc.php';
session_start();

$email = $_SESSION['email'];
$qur = "SELECT * FROM orgs WHERE o_email='$email';";
$orgqur = mysqli_query($conn, $qur);
$orgqurresultcheck = mysqli_fetch_row($orgqur);

$sql = "SELECT * FROM survey WHERE s_id IN (SELECT s_id FROM survey_owner WHERE o_id='$orgqur[1]') LIKE '%" . $_POST['name'] . "%'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
		          <td>" . $row['s_name'] . "</td>
		        </tr>";
    }
} else {
    echo "<tr><td>0 result's found</td></tr>";
}
