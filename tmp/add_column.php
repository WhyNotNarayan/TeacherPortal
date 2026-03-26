<?php
$mysqli = new mysqli("localhost", "root", "", "teacher_portal");
$mysqli->query("ALTER TABLE auth_user ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
echo "Column updated_at added to auth_user\n";

$result = $mysqli->query("DESCRIBE teachers");
echo "\nStructure of teachers:\n";
while ($row = $result->fetch_assoc()) {
    echo $row['Field'] . " (" . $row['Type'] . ")\n";
}
$mysqli->close();
