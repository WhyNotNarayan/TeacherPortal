<?php
$mysqli = new mysqli("localhost", "root", "", "teacher_portal");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM auth_user");
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . "\n";
    echo "Email: " . $row['email'] . "\n";
    echo "Password: " . $row['password'] . "\n";
}
$mysqli->close();
