<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WST Student List</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      color: #f0f0f0;
    }

    header {
      background-color: #121212;
      color: #fff;
      padding: 15px 20px;
      position: sticky;
      top: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .left-section {
      display: flex;
      align-items: center;
      gap: 30px;
    }

    header h1 {
      margin: 0;
      font-size: 22px;
    }

    .class-section {
      font-weight: bold;
      font-size: 14px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 15px;
      font-weight: bold;
      transition: color 0.3s;
    }

    nav a:hover {
      color: #00adb5;
    }

    h2 {
      text-align: center;
      margin-top: 40px;
      font-family: 'Georgia', serif;
      color: #ffffff;
    }

    table {
      width: 80%;
      margin: 30px auto;
      border-collapse: collapse;
      background-color: #1e1e1e;
      box-shadow: 0 0 10px rgba(0,0,0,0.6);
    }

    th, td {
      padding: 12px 20px;
      text-align: center;
      border: 1px solid #555;
    }

    th {
      background-color: #111;
      color: #00adb5;
    }

    td {
      color: #eee;
    }

    .btn-container {
      text-align: center;
      margin-bottom: 30px;
    }

    button {
      background: #00adb5;
      color: #000;
      font-weight: bold;
      padding: 10px 20px;
      margin: 0 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #00ffc6;
    }
  </style>
</head>
<body>

<header>
  <div class="left-section">
    <h1>WST Final Project</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="team.html">Team</a>
    </nav>
  </div>
  <div class="class-section">BSIT 3A-G2</div>
</header>

<h2>List of Students</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Course</th>
  </tr>

  <?php
  $xml = new DOMDocument();
  $xml->load('students.xml');
  $students = $xml->getElementsByTagName('student');

  foreach ($students as $stud) {
      $id = $stud->getElementsByTagName('id')->item(0)->nodeValue;
      $name = $stud->getElementsByTagName('name')->item(0)->nodeValue;
      $course = $stud->getElementsByTagName('course')->item(0)->nodeValue;
      echo "<tr>
              <td>$id</td>
              <td>$name</td>
              <td>$course</td>
            </tr>";
  }
  ?>
</table>

<div class="btn-container">
  <button onclick="location.href='add.php'">Add New</button>
  <button onclick="location.href='delete.php'">Delete</button>
  <button onclick="location.href='update.php'">Search / Update</button>
</div>

</body>
</html>