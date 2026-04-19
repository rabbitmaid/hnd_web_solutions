<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Data</title>
</head>
<body>

    <?php
        if(file_exists(__DIR__ . "/hnd2023.txt")): 
            $contents = file_get_contents(__DIR__ . "/hnd2023.txt");
    ?>

            <table border="1">

                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Country</th>
                </tr>

                <?= $contents ?>

            </table>

    <?php endif ?>
    
</body>
</html>