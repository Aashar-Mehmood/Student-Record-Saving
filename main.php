<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Record System</title>
  <link rel="stylesheet" href="./main.css" />
</head>

<body>
  <header>
    <h1>Student Record Saving System</h1>
    <h2>PHP and MySql</h2>
  </header>
  <main>
    <form action="./insert.php" method="POST" id="insert">
      <h2>Press tab to go in next input field</h2>
      <div>
        <label for="">Name : </label>
        <input type="text" name="st_name" id="" tabindex="1" />
      </div>
      <div>
        <label for="">Studen_Id : </label>
        <input type="text" name="st_id" id="" tabindex="2" />
      </div>
      <div>
        <label for="">ML Marks : </label>
        <input type="number" name="sbj1" id="" tabindex="3" />
      </div>
      <div>
        <label for="">DSD Marks : </label>
        <input type="number" name="sbj2" id="" tabindex="4" />
      </div>
      <div>
        <label for="">MAD Marks : </label>
        <input type="number" name="sbj3" id="" tabindex="5" />
      </div>
      <div>
        <label for="">PS Marks : </label>
        <input type="number" name="sbj4" id="" tabindex="6" />
      </div>
      <div>
        <label for="">GF Marks : </label>
        <input type="number" name="sbj5" id="" tabindex="7" />
      </div>
      <div>
        <label for="">CAD Marks : </label>
        <input type="number" name="sbj6" id="" tabindex="8" />
      </div>
      <div>
        <label for="">DSA Marks : </label>
        <input type="number" name="sbj7" id="" tabindex="9" />
      </div>
      <div>
        <label for="">DSP Marks : </label>
        <input type="number" name="sbj8" id="" tabindex="10" />
      </div>
      <div>
        <label for="">CCN Marks : </label>
        <input type="number" name="sbj9" id="" tabindex="11" />
      </div>
      <div>
        <label for="">SNS Marks :</label>
        <input type="number" name="sbj10" id="" tabindex="12" />
      </div>
      <button name="insert" id="insert">Insert</button>
    </form>

    <form action="./displayAll.php" method="POST" id="display">
      <h2>Enter Roll Number and apply Operations on Record</h2>
      <button name="printAll" id="print">Print All</button>
      <input type="text" name="targetRollNo" placeholder="Enter Roll Number of Student to be Searched" />
      <button name="search" title="Search a particular Record">Search Record</button>
      <button name="delete" title="Delete a particular Record">Delete Record</button>
      <button name="max" title="total Marks in All Subjects">Total Marks</button>
      <button name="avg" title="Average Marks">Avg Marks</button>
      <button name="min" title="Minimum Marks">Min Marks</button>
      <button name="max" title="Maximum Marks">Max Marks</button>
    </form>
  </main>
  <footer>
    <h2>Copy right &copy; Aashar Mehmood</h2>
  </footer>

</body>

</html>
