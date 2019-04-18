<?php
namespace mrv1187;
/**use mrv1187\Table\Headers;*/
use mrv1187\Table\TableCreation;
use mrv1187\DB;
require_once "vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSV Reader Array</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"> Table
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php

    $data = FileToArray::fileToArray('data/data.csv');
    $table = TableCreation::createTable($data);
    /**$headers = Headers::headersFromCSV('data/data.csv');
    $headings = TableCreation::createTable($headers);
    echo $headings;*/
    echo $table;

$pdo = (new DB\SQLiteConnection())->connect();
if ($pdo != null)
echo 'Connected to the SQLite database successfully!';
else
echo 'Whoops, could not connect to the SQLite database!';

phpinfo();
?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>