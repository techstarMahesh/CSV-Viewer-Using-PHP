<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your csv file in table</title>

    <style>
    /* include the css file */
    <?php require("css.css");
    ?>
    </style>

</head>


<body>
    <h1>
        This is your file detials
    </h1>
    <?php
    // show files data in a table
    require("showTable.php");

    // process the all files data and upload it to the database
    require("processing.php");

    ?>
</body>

</html>