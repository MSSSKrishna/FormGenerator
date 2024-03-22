<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("form.php");
$dependancy = [
    "input" => "VARCHAR(50)",
    "textarea" => "VARCHAR(50)",
    "date" => "DATE",
    "number" => "BIGINT",
    "email" => "VARCHAR(50)"
];
$sql_query = "CREATE TABLE NEWTABLE (";
if (!empty($_POST)) {
    $newarray = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'select') === 0) {
            $index = substr($key, 7);
            $newarray[$_POST['col_name-' . $index]] = $value;
        }
    }
    // var_dump($newarray);
    foreach ($newarray as $key => $value) {
        $escapedKey = trim($key);
        $escapedKey = $connection->real_escape_string($escapedKey);
        // Append column name and its corresponding data type to the CREATE TABLE query
        $sql_query .= "`{$escapedKey}` {$dependancy[$value]},";
    }
    $sql_query = rtrim($sql_query, ',');
    $sql_query = $sql_query . ')';
    echo $sql_query;
    echo "<br>";
    $sql_query = trim($sql_query);

   
    if ($sql_query !== "")
        $result = $connection->query($sql_query);

    if ($result !== true) {
        echo $connection->error;
    }

    echo '<form action="submit_new.php" method="post">';
    foreach ($newarray as $index => $colName) {
        echo '<div>';
        echo '<label for="input_' . $index . '">' . $index . ':</label><br>';
        echo '<input type="' . $colName . '" name="' . $index . '">';
        echo '</div>';
    }
    echo '<button type="submit">Submit</button>';
    echo '</form>';

    // $newtarray = [];
    // $table_fill = $connection->query($sql_query); 
}
