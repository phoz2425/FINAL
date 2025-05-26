<?php
$xml = new DOMDocument();
$xml->load('students.xml');
$students = $xml->getElementsByTagName('student');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Student</title>
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
    select, button {
      margin: 10px;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
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

<h2>Delete Student</h2>

<form method="post">
  <label for="id">Select Student:</label><br>
  <select name="id" required>
    <?php foreach ($students as $stud): 
      $id = $stud->getElementsByTagName('id')[0]->nodeValue;
      $name = $stud->getElementsByTagName('name')[0]->nodeValue;
    ?>
      <option value="<?= $id ?>"><?= $name ?> (ID: <?= $id ?>)</option>
    <?php endforeach; ?>
  </select><br>
  <button type="submit" name="delete">Delete</button>
  <button onclick="location.href='index.php'" type="button">Back</button>
</form>

<?php
if (isset($_POST['delete'])) {
  foreach ($students as $student) {
    if ($student->getElementsByTagName('id')[0]->nodeValue == $_POST['id']) {
      $student->parentNode->removeChild($student);
      $xml->save('students.xml');
      echo "<script>alert('Student deleted successfully!'); window.location.href='index.php';</script>";
      break;
    }
  }
}
?>

</body>
</html>