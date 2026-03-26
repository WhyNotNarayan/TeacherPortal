<?php
// Create a test user directly
$mysqli = new mysqli("localhost", "root", "", "teacher_portal");

// Check if test user already exists
$result = $mysqli->query("SELECT id, email FROM auth_user WHERE email='test@test.com'");

if ($result->num_rows > 0) {
    echo "Test user already exists\n";
} else {
    $hash = password_hash('test123', PASSWORD_BCRYPT);
    $now = date('Y-m-d H:i:s');
    $stmt = $mysqli->prepare("INSERT INTO auth_user (email, first_name, last_name, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $email, $first, $last, $hash, $now, $now);
    $email = 'test@test.com';
    $first = 'Test';
    $last = 'User';
    $stmt->execute();
    $userId = $mysqli->insert_id;

    // Insert teacher record
    $mysqli->query("INSERT INTO teachers (user_id, university_name, gender, year_joined) VALUES ($userId, 'Test Uni', 'Male', 2024)");

    echo "Test user created!\n";
}

echo "Email: test@test.com\nPassword: test123\n";
$mysqli->close();
