<?php require_once __DIR__ . "/db_connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Data</title>
</head>

<body>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>Zip Code</th>
        </tr>
        <?php
            $sql = "SELECT * FROM SWE";
            $result = mysqli_query($connection, $sql);

            if (!$result) {
                die("Error getting records from the database");
            }

            $allSWE = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // print_r($allSWE);

            if (count($allSWE) > 0):
        ?>

            <?php foreach ($allSWE as $SWE): ?>


                <tr>
                    <td><?= $SWE['name'] ?></td>
                    <td><?= $SWE['email'] ?></td>
                    <td><?= $SWE['country'] ?></td>
                    <td><?= $SWE['zip_code'] ?></td>
                </tr>

            <?php endforeach ?>


        <?php endif ?>
    </table>

</body>

</html>