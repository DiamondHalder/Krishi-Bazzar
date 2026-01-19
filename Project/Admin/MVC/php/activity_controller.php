<?php
require_once "session_check.php";
include "../db/config.php";

$sql = "SELECT * FROM activity_log ORDER BY activity_time DESC";
$result = mysqli_query($conn, $sql);

$activities = [];
while ($row = mysqli_fetch_assoc($result)) 
{
    $activities[] = $row;
}

mysqli_close($conn);

$data = [
    'activities' => $activities
];

require_once "../html/activity.php";
?>