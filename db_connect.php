<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "happympm";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully<br>";
    

    // $sql = "SELECT * FROM product";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    
    // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
