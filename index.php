<?php
    // $file = $_GET['file'];
    // $sequences = array("../", "..\");
    // $file = str_replace($sequences, "", $file);

    // && (!is_numeric(strpos($_GET['file'],'/')))
    // (strpos($file, '..') !== false || strpos($file, '/') === 0 || strpos($file, '\\') === 0)

    // block with absolute path

$file = $_GET['file'];
// if (strpos($file, '..') !== false || strpos($file, '/') === 0 || strpos($file, '\\') === 0 ) {
//     die("Đường dẫn không hợp lệ."); 
// }

// $sequences = array("../", "..\"");
// $file = str_replace($sequences, "", $file);


// if( !fnmatch("file", $file) && $file != "home.php"){
//     die ("ERROR: File not found");
// }
if (isset($file)) {
    include ($file);

    echo '<br>';
    echo '<br>';

    echo "filename: " .$file;
} else {
    echo "Not Found";
    echo "filename: " .$file;
}

?>
