<?php
$table = 'students_data_tb';
$conn = mysqli_connect('127.0.0.1', 'root', '', 'students_db');
[
  'st_name' => $name, 'st_id' => $id, 'sbj1' => $sbj1,
  'sbj2' => $sbj2, 'sbj3' => $sbj3, 'sbj4' => $sbj4,
  'sbj5' => $sbj5, 'sbj6' => $sbj6, 'sbj7' => $sbj7,
  'sbj8' => $sbj8, 'sbj9' => $sbj9, 'sbj10' => $sbj10
]  = $_POST;

if (isset($_POST["insert"])) {
  mysqli_query(
    $conn,
    "INSERT INTO `students_data_tb`(
    `name`, `rollNumber`, `sbj1`, 
    `sbj22`, `sbj3`, `sbj4`, `sbj5`, `sbj6`, 
    `sbj7`, `sbj8`, `sbj9`, `sbj10`)
     VALUES (
    '$name', '$id', $sbj1, 
     $sbj2, $sbj3, $sbj4, 
     $sbj5, $sbj6, $sbj7, 
     $sbj8, $sbj9, $sbj10);"
  );
  echo "Data Inserted in the table";
  header("refresh:0.6;url=main.php");
}
mysqli_close($conn);
