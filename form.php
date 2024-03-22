
<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '';
$database_name = 'ASSIGNMENT';
$connection = new mysqli($server_name, $user_name, $password, $database_name);


// if ($connection->connect_error) {
//     die("connection error" . $connection->connect_error);
// } else {
//     echo "connection permitted";
// }
// echo "<br/>"
// if (!empty($_POST)) {
//     $name = $_POST["fname"];
//     $email = $_POST["email"];

//     $sql = "INSERT INTO USER_DETAILS(NAME,EMAIL) VALUES('$name','$email')";
//     $execute = $connection->query($sql);
//     // echo gettype($execute);
//     // if($execute == true){
//     //     echo "successfully inserted";
//     // }


// }
// $sele = "SELECT * FROM USER_DETAILS";
//     $result = $connection->query($sele);
//     // echo gettype($sele);
//     // var_dump(($sele));
//     $rows = $result->fetch_all(MYSQLI_ASSOC);
//     // var_dump($rows);
//     echo $rows[0]['NAME'];
?>