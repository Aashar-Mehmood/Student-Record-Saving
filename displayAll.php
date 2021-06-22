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
  <header>
    <h1>Student Record Saving System</h1>
    <h2>PHP and MySql</h2>
  </header>
  <main>

    <?php
    $con = mysqli_connect('127.0.0.1', 'root', '', 'students_db');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if (isset($_POST["printAll"])) {
      $data1 = mysqli_query($con, "SELECT * FROM `students_data_tb`");
      showResults($data1);
    }

    if ((isset($_POST["search"]) || isset($_POST["delete"])) && $_POST["targetRollNo"] == NULL) {
      echo "<script>alert('Enter Roll number to be searched / delete');</script>";
      header("refresh:0.6;url=main.php");
      return;
    } else if (isset($_POST["search"]) && isset($_POST["targetRollNo"])) {
      $rollNo = $_POST["targetRollNo"];
      $data2 = mysqli_query(
        $con,
        "SELECT * FROM `students_data_tb`
        WHERE `rollNumber` = '$rollNo';"
      );
      showResults($data2);
    } else if (isset($_POST["targetRollNo"]) && isset($_POST["delete"])) {
      $rollNo = $_POST["targetRollNo"];
      $result = mysqli_query(
        $con,
        "DELETE FROM `students_data_tb`
        WHERE `rollNumber` = '$rollNo'; "
      );
      if ($result) {
        echo "Deleted The Result of Enterd Roll Number";
        header("refresh:0.4;url=main.php");
      }
    }

    mysqli_close($con);

    function showResults($result)
    {
      echo
      "<table>
        <tr>
          <th>Name</th>
          <th>Roll No.</th>
          <th>Subj1</th>
          <th>Subj2</th>
          <th>Subj3</th>
          <th>Subj4</th>
          <th>Subj5</th>
          <th>Subj6</th>
          <th>Subj7</th>
          <th>Subj8</th>
          <th>Subj9</th>
          <th>Subj10</th>
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
    ?>
  </main>
  <footer>
    <h2>Copy right &copy; Aashar Mehmood</h2>
  </footer>
</body>

</html>
