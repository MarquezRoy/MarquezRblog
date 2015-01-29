<?php

require_once(__DIR__ . "/../model/database.php");

$connection = new mysqli($host, $username, $password);

if ($connection->connect_error) {
    die("<center><p>Error: " . $connection->connect_error) . ",</p></center>";
}

$exists = $connection->select_db($database);

if (!$exists) {
    $query = $connection->query("CREATE DATABASE $database");

    if ($query) {
        echo "<center><p>Succesfully created database: " . $database . "</p></center";
    }
} else {
    echo "<center>Database already exists.</center>";
}

$query = $connection->query("CREATE TABLE posts ("
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        . "title varchar(255) NOT NULL,"
        . "post text NOT NULL,"
        . "PRIMARY KEY (id))");

if ($query) {
    echo "Succesfully created table: posts";
} else {
    echo "<center><p>$connection->error</p></center>";
}

$connection->close();

