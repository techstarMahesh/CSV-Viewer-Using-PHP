<?php
// this code of processing the datas
if (isset($_FILES["csvFile"])) {

    $csvFile = $_FILES["csvFile"]; // pointer of file
    $csvFileTemp = $csvFile; // temp pointer of file
    $file_temp = $csvFile['tmp_name']; // temp file name
    $file_name = $csvFile['name']; // file name
    $file_size = $csvFile['size']; // file size
    $file_type = $csvFile['type']; // file type

    echo "<h3>File Name: " . $file_name . "<br>" . "File Size: " . $file_size . "<br>" . "File Type: " . $file_type . "<br>" . "File Temp: " . $file_temp . "<br></h3>";


    $csvFile = $_FILES["csvFile"];
    $file_name = $csvFile['name'];
    $file_temp = $csvFile['tmp_name'];

    // Set the source and destination directories for the uploaded file
    $source_dir = $file_temp;

    if (!file_exists("uploads")) {
        mkdir("uploads");
    }

    $destination_dir = "uploads/";

    // Generate a unique file name to prevent overwriting files with the same name
    $new_file_name = uniqid() . '_' . $file_name;

    // Copy the uploaded file to the destination directory with the new file name
    if (copy($source_dir, $destination_dir . $new_file_name)) {
        echo "<h2>File uploaded successfully.</h2><br>";
        // Display a link to download the new file
        echo "<a class='btn' href='" . $destination_dir . $new_file_name . "'>Download File</a>";
        echo "<a class='btn' href='/'>Upload Again</a>";
    } else {
        echo "Error uploading file.";
    }

    // Display the uploaded file
    $file = fopen($file_temp, "r");
    $data = fgetcsv($file);
    echo "<table border='1'>";
    echo "<tr>";
    foreach ($data as $value) {
        echo "<th>" . $value . "</th>";
    }
    echo "</tr>";
    $count = 0;
    // show only top 100 data
    while ($data = fgetcsv($file)) {
        echo "<tr>";
        foreach ($data as $value) {
            echo "<td>" . $value . "</td>";
        }
        $count++;
        if ($count >= 100) {
            break;
        }
        echo "</tr>";
    }
    echo "</table>";

    fclose($file);

    // if you are gose wrong
} else {
    echo "You are going wrong";
}
?>