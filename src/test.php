<?php
// Get current directory
echo getcwd() . "<br>";

// Change directory
// chdir("images");

if (!is_dir("images")) {
    echo "Directory does not exist";
    mkdir("images");
    echo "Directory created";
    chdir("images");
    echo getcwd();
}

// Get current directory
?>