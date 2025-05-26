<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <style>
    body {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      font-family: 'Segoe UI', sans-serif;
      color: #f0f0f0;
      text-align: center;
      padding-top: 50px;
    }
    form {
      background-color: #1e1e1e;
      display: inline-block;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px #000;
    }
    input, button {
      margin: 10px;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
    }
    input {
      width: 250px;
    }
    button {
      background-color: #00adb5;
      color: black;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #00ffc6;
    }
  </style>
</head>
<body>

<h2>Add New Student</h2>

<form method="post">
  <input type="text" name="id" placeholder="Student ID" required><br>
  <input type="text" name="name" placeholder="Full Name" required><br>
  <input type="text" name="course" placeholder="Course" required><br>
  <button type="submit">Add Student</button>
  <button onclick="location.href='index.php'" type="button">Back</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $xml = new DOMDocument();
  $xml->load('students.xml');

  $students = $xml->getElementsByTagName('Students')->item(0);

  $newStudent = $xml->createElement('student');

  $id = $xml->createElement('id', $_POST['id']);
  $name = $xml->createElement('name', $_POST['name']);
  $course = $xml->createElement('course', $_POST['course']);

  $newStudent->appendChild($id);
  $newStudent->appendChild($name);
  $newStudent->appendChild($course);

  $students->appendChild($newStudent);

  $xml->save('students.xml');
  echo "<script>alert('Student added successfully!'); window.location.href='index.php';</script>";
}
?>

</body>
</html>
