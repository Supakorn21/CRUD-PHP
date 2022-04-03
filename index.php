<?php 
require('database.php');
initMigration($pdo);

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $statement = $pdo->prepare(
            'SELECT * FROM users;'
        );
        $statement->execute();

    
        $results = $statement->fetchAll(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
        echo "<h4 style='color: red;'>" . $e->getMessage() . "</h4>";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <a href="create.php">
        Create User
    </a> <br>
    <a href="/">
        Show All Users
    </a>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($results as $user) { ?>
            <tr>
                <td>
                    <h4><?php echo $user->id; ?></h4>
                </td>
                <td>
                    <h4><?php echo $user->first_name; ?></h4>
                </td>
                <td>
                    <h4><?php echo $user->last_name; ?></h4>
                </td>
                <td>
                    <h4><?php echo $user->age; ?></h4>
                </td>
                <td>
                    <h4><a href="/update.php?id=<?php echo $user->id; ?>">edit</a></h4>
                </td>
                <td>
                    <h4><a href="/delete.php?id=<?php echo $user->id; ?>" onclick="confirm('Are you sure?')">delete</a></h4>
                </td>

            </tr>
        <?php } ?>
    </table>
</body>
</html>