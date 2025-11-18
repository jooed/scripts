<?php
// Create a new PDO connection
$dsn = "mysql:host=localhost;dbname=testdb;charset=utf8mb4";
$user = "root";
$pass = "";

try {
    // Initialize PDO instance
    $pdo = new PDO($dsn, $user, $pass);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute a SQL query
    $stmt = $pdo->prepare("SELECT * FROM users WHERE status = :status");
    $stmt->execute(['status' => 'active']);

    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print_r($results);

} catch (PDOException $e) {
    // Handle connection or query errors
    echo "Database error: " . $e->getMessage();
}
