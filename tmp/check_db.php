<?php
require 'backend/vendor/autoload.php';
$config = new Config\Database();
try {
    $db = \Config\Database::connect();
    echo "Connected successfully to " . $db->getDatabase() . "\n";
    
    $tables = $db->listTables();
    echo "Tables: " . implode(", ", $tables) . "\n";
    
    if (in_array('auth_user', $tables)) {
        echo "auth_user table exists.\n";
        $fields = $db->getFieldNames('auth_user');
        echo "auth_user fields: " . implode(", ", $fields) . "\n";
    } else {
        echo "auth_user table MISSING!\n";
    }
    
    if (in_array('teachers', $tables)) {
        echo "teachers table exists.\n";
        $fields = $db->getFieldNames('teachers');
        echo "teachers fields: " . implode(", ", $fields) . "\n";
    } else {
        echo "teachers table MISSING!\n";
    }
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
