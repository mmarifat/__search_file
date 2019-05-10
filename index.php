<?php

//getting user input
$msg = "Invalid Search";
if (isset($_POST['search'])) {
    $search = ($_POST['search']);
    if ($search == "") {
        echo "<script type='text/javascript'>alert('$msg'); location.href='index.php';</script>";
    }
} else {
    $search = "";
}

// handling directory
$dir = '.';
$dirOrg = '.';
?>

<!doctype html>
<html>
    <head>
        <title>Show all files with directories </title>
    </head>
    <body>
        <h2>SEARCH AREA</h2>
        <div>
            <form action="index.php" method="post">
                <p>
                    <input type="text" name="search" placeholder="Enter search value" autocomplete="off">
                    <input type="submit" value="Search">
                </p>
            </form>
        </div>
        <h3>LIST OF FLIES</h3>
        <p><?php
            if (!empty($search)) {
                //getting all based on user input files 
                $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS));
                foreach ($it as $path) {
                    if (strpos($path, $search) !== false) {
                        echo '<a href = " ' . $dirOrg . '/' . $path . '">' . $path . '</a><br>';
                    }
                }
            }
            ?></p>
    </body>
</html>
