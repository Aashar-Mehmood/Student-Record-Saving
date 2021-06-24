<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Record System</title>
  <link rel="stylesheet" href="./displayAll.css" />
</head>

<body>
  <?php include('./header.php') ?>
  <main>

    <?php
    $con = mysqli_connect('127.0.0.1', 'root', '', 'students_db');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      return;
    }
    if (isset($_POST["printAll"])) {
      $data1 = mysqli_query($con, "SELECT * FROM `students_data_tb`");
      showResults($data1);
      return;
    }

    if ($_POST["targetRollNo"] == NULL) {
      echo "<script>alert('Enter Roll number to be searched / delete');</script>";
      header("refresh:0.6;url=main.php");
      return;
    } else {
      $rollNo = $_POST["targetRollNo"];

      if (isset($_POST["search"])) {
        $data2 = mysqli_query(
          $con,
          "SELECT * FROM `students_data_tb` WHERE `rollNumber` = '$rollNo';"
        );
        showResults($data2);
      }
      if (isset($_POST["delete"])) {
        $result = mysqli_query(
          $con,
          "DELETE FROM `students_data_tb`
          WHERE `rollNumber` = '$rollNo'; "
        );
        if ($result) {
          echo "Deleted The Result of Enterd Roll Number";
          header("refresh:1;url=main.php");
        }
      }
      if (isset($_POST["total"])) {
        aggregate("Total Marks", $rollNo, $con);
      }
      if (isset($_POST["avg"])) {
        aggregate("Average Marks", $rollNo, $con);
      }
      if (isset($_POST["min"])) {
        aggregate("Min Marks", $rollNo, $con);
      }
      if (isset($_POST["max"])) {
        aggregate("Max Marks", $rollNo, $con);
      }
    }

    mysqli_close($con);

    function showResults($result)
    {
      echo
      "<table>
        <tr>
          <th>Name</th>   <th>Roll No.</th> <th>Subj1</th> 
          <th>Subj2</th>  <th>Subj3</th>    <th>Subj4</th> 
          <th>Subj5</th>  <th>Subj6</th>    <th>Subj7</th> 
          <th>Subj8</th>  <th>Subj9</th>   <th>Subj10</th>
        </tr>";
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td>" . $row[6] . "</td>";
        echo "<td>" . $row[7] . "</td>";
        echo "<td>" . $row[8] . "</td>";
        echo "<td>" . $row[9] . "</td>";
        echo "<td>" . $row[10] . "</td>";
        echo "<td>" . $row[11] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    function aggregate($aggrType, $rollNo, $con)
    {
      $data = mysqli_query(
        $con,
        "SELECT * FROM `students_data_tb` WHERE `rollNumber` = '$rollNo';"
      );
      $arr = mysqli_fetch_array($data);
      $name = $arr[0];
      $rollNumber = $arr[1];
      $thirdCol = null;
      $sum = 0;
      $max = 0;
      $min = 0;
      for ($i = 2; $i < 12; $i++) {
        $sum += (float)$arr[$i];
      }
      if ($aggrType == "Total Marks") {
        $thirdCol = $sum;
      } else if ($aggrType == "Average Marks") {
        $thirdCol = $sum / 10;
      } else if ($aggrType == "Min Marks") {
        $min = $arr[2];
        for ($i = 3; $i < 12; $i++) {
          if ($arr[$i] < $min) {
            $min = $arr[$i];
          }
        }
        $thirdCol = $min;
      } else if ($aggrType == "Max Marks") {
        $max = $arr[2];
        for ($i = 3; $i < 12; $i++) {
          if ($arr[$i] > $max) {
            $max = $arr[$i];
          }
        }
        $thirdCol = $max;
      }
      echo
      "<table>
        <tr>
          <th>Name</th>
          <th>Roll No.</th>
          <th>$aggrType</th>
        </tr>
        <tr>
          <td>$name</td>
          <td>$rollNumber</td>
          <td>$thirdCol</td>
        </tr>
        </table>";
    }
    ?>
  </main>
  <footer>
    <h2>Copy right &copy; Aashar Mehmood</h2>
  </footer>
</body>

</html>
