<?php
// Include the file that contains the function to check the data types
include("checkDataTypes.php");

// Check if the user uploaded a file
if (!isset($_FILES["csvFile"])) {
    echo "No file uploaded";
    exit();
}

// Check if the file is a CSV file
if ($_FILES["csvFile"]["type"] != "text/csv") {
    echo "File is not a CSV file";
    exit();
}


// Read the uploaded CSV file and get its data and header row
$csvFile = $_FILES["csvFile"]["tmp_name"]; // pointer of file
$file_name = $_FILES["csvFile"]["name"]; // file name
$csvFilesPtr = fopen($csvFile, "r");
$data = array();
$header = fgetcsv($csvFilesPtr);


// Get the number of columns in the CSV file
$num_columns = count($header);

// Create the new header row with the column names and data types
$new_header = array();
for ($i = 0; $i < $num_columns; $i++) {
    $new_header[] = $header[$i];
    $new_header[] = $header[$i] . "_TYPE";
}

// Loop through each row of data in the file
while (($row = fgetcsv($csvFilesPtr)) !== false) {
    // Get the data types for each column in the row
    $types = array();
    foreach ($row as $value) {
        // $types[] = gettype($value);
        $types[] = checkNumberColumns($value);
    }

    // Add the data types to the row and add the row to the new data array
    $new_row = array();
    for ($i = 0; $i < $num_columns; $i++) {
        $new_row[] = $row[$i];
        $new_row[] = $types[$i];
    }
    $data[] = $new_row;
}
// Close the file csvFilesPtr
fclose($csvFilesPtr);

// Set the destination directory and file name for the new CSV file
if (!file_exists("uploads")) {
    mkdir("uploads");
}

$destination_dir = "uploads/";
$new_file_name = pathinfo($file_name, PATHINFO_FILENAME) . '_' . uniqid() . '_with_type.csv';


// Open the new file for writing
$new_csvFilesPtr = fopen($destination_dir . $new_file_name, "w");

// Write the header row to the new file
fputcsv($new_csvFilesPtr, $new_header);

// Write each row of data to the new file
foreach ($data as $row) {
    fputcsv($new_csvFilesPtr, $row);
}

// Close the new file csvFilesPtr
fclose($new_csvFilesPtr);

// Display a link to download the new file
echo "<h1>New file created: </h1><br><a class='btn' href='" . $destination_dir . $new_file_name . "'>" . $new_file_name . "</a>";

?>