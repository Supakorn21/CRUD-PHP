<?php
require('database.php');

// POST
// GET
// PUT
// DELETE

//   Handle GET Request
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["id"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $id = $_GET["id"];

    try {
        $statement = $pdo->prepare(
            'DELETE FROM users WHERE id = :id'
        );

        $statement->execute(["id" => $id]);

        echo "<script>location.href='/'</script>";
    } catch (PDOException $e) {
        echo "<h4 style='color: red;'>" . $e->getMessage() . "</h4>";
    }
}else{
    echo "<script>location.href='/'</script>";
    die();
}
