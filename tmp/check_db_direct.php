<?php
$mysqli = new mysqli("localhost", "root", "", "teacher_portal");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully\n";

$result = $mysqli->query("SHOW TABLES");
echo "Tables:\n";
while ($row = $result->fetch_array()) {
    echo $row[0] . "\n";
}

foreach (['auth_user', 'teachers'] as $table) {
    echo "\nStructure of $table:\n";
    $result = $mysqli->query("DESCRIBE $table");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            print_r($row);
        }
    } else {
        echo "Table $table DOES NOT EXIST!\n";
    }
}
$mysqli->close();
