<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="navbar.css">
    <title>Read your CSV File</title>
</head>
<style>
<?php include("css.css");
?>
</style>
<fieldset>
    <legend>
        <h2>Upload your CSV Files</h2>
    </legend>
    <div>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="file" name="csvFile" id="csvFile" accept="text/csv" required>
            </div>
            <div>
                <input type="Submit" value="Submit">
            </div>
        </form>
    </div>
</fieldset>

<body>
</body>

</html>