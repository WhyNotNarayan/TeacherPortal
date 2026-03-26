<?php
$mysqli = new mysqli("localhost", "root", "", "teacher_portal");
$result = $mysqli->query("DESCRIBE auth_user");
while ($row = $result->fetch_assoc()) {
    echo $row['Field'] . " (" . $row['Type'] . ")\n";
}
$mysqli->close();
