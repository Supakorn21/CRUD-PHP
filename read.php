<?php
require('database.php');

// // show All
// if ($_GET["show"] == "all") {
//     try {
//         $statement = $pdo->prepare(
//             'SELECT * FROM users;'
//         );
//         $statement->execute();

//         // echo "Read from table users<br>";
//         $results = $statement->fetchAll(PDO::FETCH_OBJ);

//         echo ($results[0]->first_name);
//     } catch (PDOException $e) {
//         echo "<h4 style='color: red;'>" . $e->getMessage() . "</h4>";
//     }
// } 

if (isset($_GET["show"]) && isset($_GET["id"])) {
    $id = $_GET["id"];
    try {
        $statement = $pdo->prepare(
            'SELECT * FROM users where id = :id;'
        );
        $statement->execute(["id" => $id]);

        $results = $statement->fetchAll(PDO::FETCH_OBJ);
        // echo "Read from table users</br>";
    } catch (PDOException $e) {
        echo "<h4 style='color: red;'>" . $e->getMessage() . "</h4>";
    }
} else {
    echo "<script>location.href='/'</script>";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ CRUD</title>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>age</th>
            <th>edit</th>
            <th>delete</th>
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
    <a href="/">Go Back</a>
</body>

</html>