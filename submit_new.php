<?php
include_once("form.php");

$sql_table = 'INSERT INTO NEWTABLE VALUES (';
foreach ($_POST as $value) {
    //used to escape string for preventing sql injection
    $escapedValue = trim($value);
    $escapedValue = $connection->real_escape_string($escapedValue);
    $sql_table .= "'{$escapedValue}',";
}
$sql_table = rtrim($sql_table, ',');
$sql_table .= ')';
// echo $sql_table;
$result = $connection->query($sql_table);
if ($result == true) {
    echo "executed";
} else {
    echo $connection->error;
}

$sql_column = "SHOW COLUMNS FROM NEWTABLE";
$result_get = $connection->query($sql_column);

$columns = [];

if ($result_get) {
    while ($row = $result_get->fetch_assoc()) {
        $columns[] = $row["Field"];
    }
}
//showing the result in table
echo "<table>";
foreach ($columns as $column) {
    echo "<th> {$column} </th>";
}
$sql_get = "SELECT * FROM NEWTABLE";
$result_select = $connection->query($sql_get);
if ($result_select) {
    while ($row = $result_select->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo  "<td>$value</td>";
        }
        echo "</tr>";
    }
}

echo "</table>";
